<?php

namespace App\Task;

use App\Containers\User\Contracts\UserRepositoryInterface;
use App\Ship\Parents\Tasks\Task;
use App\Task\EncryptionTask;
use App\User;

/**
 * Class ConfirmAccountTask.
 *
 */
class ConfirmAccountTask
{
    /**
     * @param string $email
     * @param string $token
     *
     * @return array
     */
    public function run($email, $token)
    {
        $result = ['message' => 'Account confirmed successfully !', 'status' => 200];

        /** @var User $user */
        $user = User::where('email_token', '=', $token)->first();

        if(!is_null($user))
        {
            //On vérifie que le token trouvé est associé à l'adresse email qui a été envoyé
            if($user->email !== $email)
            {
                $result['status'] = 400;
                $result['message'] = "Bad email address for this token !";
            }
            else{
                $user->update(['confirmed' => true]);
            }
        }
        else
        {
            $result['status'] = 400;
            $result['message'] = "Bad token provided !";
        }

        return $result;
    }

}
