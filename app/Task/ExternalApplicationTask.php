<?php

namespace App\Task;


use App\Application;
use Illuminate\Support\Facades\Log;

class ExternalApplicationTask
{
    public function __construct()
    {

    }

    /**
     * @param $client_id
     * @param $client_secret
     *
     * @return array
     */
    public function getToken($client_id, $client_secret) {
        $data = ['code' => 400, 'message' => '', 'token' => null];

        /** @var Application $application */
        $application = Application::where([['client_id', '=', $client_id], ['token', '=', $client_secret]])->first();

        if(is_null($application)) {
            $data['message'] = 'Invalid client id or client secret';
        } else {
            $tokenLifetime = env('TOKEN_LIFETIME', 24);
            $date = new \DateTime();

            try{
                $date->add(new \DateInterval('PT'.$tokenLifetime.'H'));
            } catch (\Exception $e) {
                $data['message'] = 'Error occured when proccessing !';
            }

            $string = ['date' => $date->format('Y-m-d h:i:s'), 'appid' => $application->id];

            $task = new EncryptionTask(json_encode($string));
            $data['code'] = 200;
            $data['message'] = 'Success';
            $data['token'] = $task->run(EncryptionTask::ENCRYPT);
        }

        return $data;
    }

    /**
     * @param $token
     *
     * @return array|mixed
     */
    public function decodeToken($token) {
        $data = ['code' => 400, 'message' => ''];

        $task = new EncryptionTask($token);
        try{
            $decodedString = $task->run(EncryptionTask::DECRYPT);
            $result = json_decode($decodedString);

            $dateNow = new \DateTime('now', null);
            $dateToken = new \DateTime($result->date, null);

            // Log::info($dateToken->format('Y-m-d h:i:s').'===='.$dateNow->format('Y-m-d h:i:s'));
            // Log::info($dateToken < $dateNow);

            if($dateToken < $dateNow) {
                $data['message'] = 'Token expired !';
            } else {
                $data['code'] = 200;
                $data['message'] = $result->appid;
            }
        } catch (\Exception $e) {
            $data['code'] = 400;
            $data['message'] = 'Invalid Token !';
        }

        return $data;
    }
}