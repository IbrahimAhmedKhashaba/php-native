<?php 
if(!function_exists('encrypt')){
    function encrypt(string $value): string{
        $cipher = config('session.encryption_mode');
        $key = config('session.encryption_key');
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes( $ivlen);
        $cipherText_raw = openssl_encrypt($value, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $cipherText_raw, $key, true);
        $cipherText = base64_encode($iv.$hmac.$cipherText_raw);
        return $cipherText;
    }
}

if(!function_exists(function: 'decrypt')){
    function decrypt(string $cipherText): string {
        $cipher = config('session.encryption_mode');
        $key = config('session.encryption_key');
        $convert = base64_decode($cipherText);
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = substr($convert, 0, $ivlen);
        $hmac = substr($convert, $ivlen, 32);
        $cipherText_raw = substr($convert, $ivlen+32);
        $original_text = openssl_decrypt($cipherText_raw, $cipher, $key, OPENSSL_RAW_DATA, $iv);
        $calcMac = hash_hmac('sha256', $cipherText_raw, $key, true);
        if(hash_equals($hmac , $calcMac)){
            return ($original_text);
        }
        return '';
    }
}