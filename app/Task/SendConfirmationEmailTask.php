<?php

namespace App\Task;

use App\Jobs\SendConfirmationEmail;
use App\User;

/**
 * Class SendConfirmationEmailTask.
 *
 */
class SendConfirmationEmailTask
{
    /**
     * @param User   $user
     *
     * @return void
     */
    public function run(User $user)
    {
        dispatch(new SendConfirmationEmail($user));
    }

}
