<?php

namespace App\Http\Controllers;

use App\Rest\RestClient;
use App\Task\ConfirmAccountTask;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    const ACCOUNT_CONFIRM_ENDPOINT = "confirm-account";
    const RESET_PASSWORD_ENDPOINT = "reset-password";
    const VERIFY_RESET_PASSWORD_ENDPOINT = "reset-password-verify";

    public function confirmAccount(Request $request)
    {
        $array = ['valid' => 1, 'message' => ""];

        $email = $request->get('email');
        $token = $request->get('confirmationtoken');

        if(!isset($email) || !isset($token)){
            return redirect(route("login"));
        }

        $task = new ConfirmAccountTask();
        $result = $task->run($email, $token);

        if ($result['status'] == 200)
        {
            $array['message'] = $result['message'];
        } else {
            $array['valid'] = 0;
            $array['message'] = "Your account can't be confirmed !";
        }

        return view('auth.confirm-account', $array);
    }

    public function forgot()
    {
        $appToken = env('APP_ACCESS_TOKEN');

        return view('auth.passwords.email', ['token' => $appToken]);
    }

    public function reset(Request $request)
    {
        $email = $request->get('email');
        $token = $request->get('confirmationtoken');

        $array = ['valid' => 1, 'message' => "", "email" => $email];

        if(!isset($email) || !isset($token)){
            return redirect(route("login"));
        }

        if($request->isMethod('POST'))
        {
            $password = $request->get('password');

            if(!isset($password)){
                return redirect(route('login'));
            }
            else//reset-password-request
            {
                $data = ['email' => $email, 'password' => $password];

                $client = new RestClient(RestClient::PUT, self::RESET_PASSWORD_ENDPOINT, null, $data, null);

                if($client->getStatusCode() == 200)
                {
                    $array['valid'] = 2;
                    $array['message'] = $client->getContent();
                }
                else{
                    $array['valid'] = 0;
                    $array['message'] = "Une erreur est survenue lors de la réinitialisation du mot de passe !";
                }
            }
        }
        else
        {
            $data = ['email' => $email, 'token' => $token];

            $client = new RestClient(RestClient::POST, self::VERIFY_RESET_PASSWORD_ENDPOINT, null, $data, null);

            if ($client->getStatusCode() == 200)
            {
                $array['message'] = $client->getContent();
            } else {
                $array['valid'] = 0;
                $array['message'] = "Impossible de vérifier les informations !";
            }
        }

        return view('auth.passwords.reset', $array);
    }
}
