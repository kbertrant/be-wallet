<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 11/7/18
 * Time: 8:02 PM
 */

namespace App\Utils;


class Utils
{
    /**
     * @param $maxId
     *
     * @return string
     */
    public static function FormatId($maxId)
    {
        $tmax = 6; $str = "";

        $cpt = $tmax - strlen($maxId);
        while($cpt > 0)
        {
            $str .= "0";
            $cpt--;
        }

        return $str."".$maxId;
    }
}