<?php

namespace App\Classes;

class HideId{

    /**
     * Encrypts the id
     * @param string $value
     * @return string
     */
    public static function hide($value)
    {
      return bin2hex(openssl_encrypt($value, 'aes-256-cbc', 'kWz0ZQDKWFdurroktedRqXSFLRcNzUpN', OPENSSL_RAW_DATA, '4OxZcnAuTiqLmobe'));
    }

    /**
     * Decrypts the id
     * @param string $hidden_value
     * @return string
     */
    public static function reveal($hidden_value)
    {
      if(strlen($hidden_value)%2!=0){
          return null;
      }else{
          return openssl_decrypt(hex2bin($hidden_value),'aes-256-cbc', 'kWz0ZQDKWFdurroktedRqXSFLRcNzUpN', OPENSSL_RAW_DATA, '4OxZcnAuTiqLmobe');
      }
    }
}