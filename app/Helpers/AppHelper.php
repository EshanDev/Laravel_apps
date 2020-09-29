<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

if(!function_exists('hello')) {
    function hello() {
        return "Hello Helper";
    }
}


if (!function_exists('getSerial')){


    function salt($leng = 22){
        return substr(sha1(mt_rand()), 0, $leng);
    }
    function getSerial(){
        $code = '0123456789';
        $hash = md5($code . salt());

        for ($i = 0; $i < 1000; $i++) {
            $hash = md5($hash);
        }
        return implode('-', str_split(substr(strtoupper($hash), 0, 20), 5));
    }
}

if(!function_exists('generateUserName')){
    function generateUserName($length = 5) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return "SDL-".$randomString;
    }
}

if(!function_exists('CountSerials')){
    function CountSerials()
    {
        $serials = \Illuminate\Support\Facades\DB::table('serials')->count();
        return $serials;
    }
}

if(!function_exists('checkEmail')){
    function checkEmail($email){
        $Select_email = \Illuminate\Support\Facades\DB::table('serials')->where('email', $email)->first();
        return $Select_email;
    }
}

if(!function_exists('url_query')){
    function url_query($to, array $param = [], array $additional = []){
        return Str::finish(url($to, $additional), '?') . Arr::query($param);
    }
}
