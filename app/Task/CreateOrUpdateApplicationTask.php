<?php

namespace App\Task;


use App\Application;

class CreateOrUpdateApplicationTask
{
    public function __construct()
    {

    }

    /**
     * @param $appid
     * @param $user_id
     * @param $name
     * @param $url
     * @param $success_url
     * @param $cancel_url
     *
     * @return string
     */
    public function run($appid, $user_id, $name, $url, $success_url, $cancel_url) {

        if(is_null($appid) || empty($appid)) {

            $client_id = 'bwt_'.md5($name.$user_id.uniqid());

            $task = new EncryptionTask($name.$user_id);
            $token = $task->run(EncryptionTask::ENCRYPT);

            $now = new \DateTime();

            $data = [
                'name'          => $name,
                'user_id'       => $user_id,
                'url'           => $url,
                'client_id'     => $client_id,
                'token'         => $token,
                'success_url'   => $success_url,
                'cancel_url'    => $cancel_url,
                'created_at'    => $now,
                'updated_at'    => $now,
            ];

            return Application::create($data);
        } else {
            /** @var Application $application */
            $application = Application::where('id', $appid)->first();

            $data = [
                'name'          => $name,
                'url'           => $url,
                'success_url'   => $success_url,
                'cancel_url'    => $cancel_url
            ];

            $application->update($data);

            return $application;
        }
    }
}