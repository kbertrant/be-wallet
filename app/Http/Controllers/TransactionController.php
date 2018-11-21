<?php

namespace App\Http\Controllers;

use App\Application;
use App\Task\CreateTransactionTask;
use App\Task\ExternalApplicationTask;
use App\Task\GetCinePaySignatureTask;
use App\Task\GetPaymentStatusTask;
use App\Task\GetUserTransactionListTask;
use App\Task\RedirectToPaymentSiteTask;
use App\Task\TransferMoneyTask;
use App\Transaction;
use App\Transfer;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transaction.index');
    }

    /**
     * Show the form for creating a new withdraw.
     *
     * @return \Illuminate\Http\Response
     */
    public function withdraw()
    {
        return view('transaction.withdraw');
    }


    /**
     * Show the form for paying a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay_service()
    {
        return view('transaction.pay_service');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function store(Request $request)
    {
        $amount = $request->get('amount');
        $type = $request->get('type');

        $createTransactiontask = new CreateTransactionTask();
        /** @var Transaction $transaction */
        $transaction = $createTransactiontask->run($type, Auth::user()->id, $amount);

        $getSignatureTask = new GetCinePaySignatureTask();
        $result = $getSignatureTask->run($transaction);

        if($result['code'] === 400 || $result['signature'] === null) {
            $message = $result['message'];
            try {
                // $transaction->delete();
            } catch (\Exception $e) {
                $message = $e->getMessage();
            }

            return Redirect::route('transactions.create')->with('error', $message)->with('amount', $amount);
        } else {
            $transaction->update(['signature' => $result['signature']]);

            $securePayTask = new RedirectToPaymentSiteTask();
            $url = $securePayTask->run($transaction);

            // Log::info($url);

            return redirect()->away($url);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $token = $request->get('token');
        $amount = $request->get('amount');

        $task = new ExternalApplicationTask();
        $data = $task->decodeToken($token);

        //dd($data);

        if($data['code'] === 200) {
            /** @var Application $application */
            $application = Application::where('id', $data['message'])->first();
        }

        return view('checkout', compact('data', 'application', 'amount', 'token'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function postCheckout(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $appId = $request->get('appid');
        $amount = $request->get('amount');
        $token = $request->get('token');

        /** @var Application $application */
        $application = Application::where('id', $appId)->first();

        if(is_null($application)){
            $data['message'] = 'Error : Unknown application !';
            return Redirect::route('checkout', ['token' => $token, 'amount' => $amount])->with('error', $data['message']);
        }
        $cancelUrl = $application->cancel_url.'?error=';

        /** @var User $receiver */
        $receiver = $application->user;

        /** @var User $sender */
        $sender = User::where([['email', '=', $email]])->first();

        if(is_null($sender) || (!is_null($sender) && !Hash::check($password, $sender->password))) {
            $data['message'] = 'Sender credentials are incorrect !';
            return Redirect::route('checkout', ['token' => $token, 'amount' => $amount])->with('error', $data['message']);
        } else if($sender->identifier === $receiver->identifier) {
            $data['code'] = 400;
            $data['message'] = 'Can\'t transfer money to yourself !';
            return redirect()->away($cancelUrl.$data['message']);
        } else if($amount > $sender->amount) {
            $data['code'] = 400;
            $data['message'] = 'Your balance is not enough to proceed ! Balance : ' . $sender->amount;
            return redirect()->away($cancelUrl.$data['message']);
        } else {
            $task = new TransferMoneyTask();
            $data = $task->run($sender, $receiver, $amount);

            if($data['code'] === 400) {
                return redirect()->away($cancelUrl.$data['message']);
            } else {
                /** @var Transfer $transfer */
                $transfer = Transfer::where('sender_id', $sender->id)->orderBy('created_at', 'desc')->first();
                $successUrl = $application->success_url.'?transfer_code='.$transfer->code;
                return redirect()->away($successUrl);
            }
        }
    }

    /**
     * Transaction Notification URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | JsonResponse
     */
    public function notify(Request $request)
    {
        $transaction_code = $request->get('cpm_trans_id');
        $payment_method = $request->get('payment_method');
        $cel_phone_num = $request->get('cel_phone_num');
        $cpm_phone_prefixe = $request->get('cpm_phone_prefixe');

        /** @var Transaction $transaction */
        $transaction = Transaction::where('code', $transaction_code)->first();

        if(!is_null($transaction)) {
            $now = new \DateTime();
            $transaction->update([
                'payment_method'    => $payment_method,
                'cel_phone_num'     => $cel_phone_num,
                'cpm_phone_prefixe' => $cpm_phone_prefixe,
                'updated_at'        => $now,
            ]);

            //Get Status
            $getPaymentStatustask = new GetPaymentStatusTask();
            $status = $getPaymentStatustask->run($transaction);

            //TODO Send email to the user

            return new JsonResponse(['message' => 'OK', 'PAYMENT_STATUS' => $status]);
        } else {
            return new JsonResponse(['message' => 'Transaction not found !']);
        }
    }

    /**
     * Transaction Success URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function success(Request $request)
    {
        return Redirect::route('transactions.create')->with('success', '');
    }

    /**
     * Transaction Cancel URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | RedirectResponse
     */
    public function cancel(Request $request)
    {
        return Redirect::route('transactions.create')->with('failed', '');
    }

    /**
     * Get transactions list of the user !
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        $userId = $request->get('user_id');

        $task = new GetUserTransactionListTask();

        $data = $task->run($userId);

        return new JsonResponse($data);
    }
}
