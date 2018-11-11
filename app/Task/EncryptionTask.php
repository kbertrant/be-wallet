<?php

namespace App\Task;

class EncryptionTask
{
    const ENCRYPT = "E";
    const DECRYPT = "D";
    const ENCRYPT_METHOD = "AES-256-CBC";

    private $text;
    private $secretKey;
    private $secretIV;

    public function __construct($text)
    {
        $this->secretKey = env('ENCRYPT_SECRET_KEY');
        $this->secretIV = env('ENCRYPT_SECRET_IV');
        $this->text = $text;
    }

    public function run($action)
    {
        $output = false;

        // hash
        $key = hash('sha256', $this->secretKey);

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $this->secretIV), 0, 16);

        if( $action == self::ENCRYPT ) {
            $output = openssl_encrypt($this->text, self::ENCRYPT_METHOD, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == self::DECRYPT ){
            $output = openssl_decrypt(base64_decode($this->text), self::ENCRYPT_METHOD, $key, 0, $iv);
        }

        return $output;
    }
}