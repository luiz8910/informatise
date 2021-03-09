<?php


namespace App\Traits;


trait Config
{
    public function random_number($length = null)
    {
        $length = $length ? $length : 5;

        $alphabet = '1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function random_string($length = null)
    {
        $length = $length ? $length : 5;

        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function raw_phone($phone)
    {
        $phone = str_replace("(", '', $phone);
        $phone = str_replace(")", '', $phone);
        $phone = str_replace("-", '', $phone);

        return trim($phone);
    }
}
