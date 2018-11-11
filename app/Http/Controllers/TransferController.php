<?php

namespace App\Http\Controllers;

use App\Task\GetUserTransferListTask;
use App\Task\TransferMoneyTask;
use App\Transfer;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transfer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $email = $request->get('email');
        $identifier = $request->get('id');
        $amount = $request->get('amount');
        $data = ['code' => 200, 'message' => ''];

        /** @var User $receiver */
        $receiver = User::where([['email', '=', $email], ['identifier', '=', $identifier]])->first();

        if(is_null($receiver)) {
            $data['code'] = 400;
            $data['message'] = 'Receiver not found !';
        } else if($receiver->identifier === Auth::user()->identifier) {
            $data['code'] = 400;
            $data['message'] = 'Can\'t transfer money to yourself !';
        } else if($amount > Auth::user()->amount) {
            $data['code'] = 400;
            $data['message'] = 'The max amount you can transfer is : ' . Auth::user()->amount;
        } else {
            $task = new TransferMoneyTask();
            $data = $task->run(Auth::user(), $receiver, $amount);
        }

        return new JsonResponse($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserByIdAndEmail(Request $request)
    {
        $email = $request->get('email');
        $identifier = $request->get('id');
        $data = ['code' => 200, 'message' => ''];

        /** @var User $user */
        $user = User::where([['email', '=', $email], ['identifier', '=', $identifier]])->first();

        if(is_null($user)) {
            $data['code'] = 400;
            $data['message'] = 'User not found !';
        } else if($user->identifier === Auth::user()->identifier) {
            $data['code'] = 400;
            $data['message'] = 'Can\'t transfer money to yourself !';
        } else {
            $data['code'] = 200;
            $data['message'] = $user->name;
        }

        return new JsonResponse($data);
    }

    /**
     * Get transfers list of the user !
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        $userId = $request->get('user_id');

        $task = new GetUserTransferListTask();

        $data = $task->run($userId);

        return new JsonResponse($data);
    }
}
