<?php

namespace App\Classes;

//The class has two methods: One encrypts the id from the database and the another one decrypt it.
class HideId{

    //Encrypt the parameter id;
    public static function hide(string $value):string
    {
      return bin2hex(openssl_encrypt($value, 'aes-256-cbc', 'kWz0ZQDKWFdurroktedRqXSFLRcNzUpN', OPENSSL_RAW_DATA, '4OxZcnAuTiqLmobe'));
    }

    //Decrypt the parameter id.
    public static function reveal(string $hidden_value)
    {
      if(strlen($hidden_value)%2!=0){
          return null;
      }else{
          return openssl_decrypt(hex2bin($hidden_value),'aes-256-cbc', 'kWz0ZQDKWFdurroktedRqXSFLRcNzUpN', OPENSSL_RAW_DATA, '4OxZcnAuTiqLmobe');
      }
    }
}