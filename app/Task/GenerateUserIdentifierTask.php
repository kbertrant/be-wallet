<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/7/18
 * Time: 7:59 PM
 */

namespace App\Task;


use App\User;
use App\Utils\Utils;

class GenerateUserIdentifierTask
{
    public function __construct()
    {

    }

    public function run() {
        /** @var User $lastUser */
        $lastUser = User::orderBy('id', 'desc')->first();

        $maxId = is_null($lastUser) ? 1 : $lastUser->id + 1;

        $year = (new \DateTime())->format('y');

        return "BWT".$year.Utils::FormatId($maxId);
    }
}