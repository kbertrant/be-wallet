<?php

namespace App\Task;

use App\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordTask
{
    public function __construct()
    {

    }

    /**
     *
     * @param User $user
     * @param string $currentPassword
     * @param string $newPassword
     * @param string $confirmPassword
     *
     * @return array
     */
    public function run($user, $currentPassword, $newPassword, $confirmPassword) {
        $result = ['code' => 400, 'message' => ''];

        if(!Hash::check($currentPassword, $user->password)) {
            $result['message'] = 'The current password is invalid !';
        } else {
            if($newPassword !== $confirmPassword) {
                $result['message'] = 'The new password doesn\'t match with the confirm password !';
            } else {
                $user->update([
                    'password' => Hash::make($confirmPassword)
                ]);
                $result['code'] = 200;
                $result['message'] = 'Password updated successfully !';
            }
        }

        return $result;
    }
}