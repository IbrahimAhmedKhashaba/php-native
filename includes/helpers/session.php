<?php

if(!function_exists('session')){
    function session(string $key , string $value = null):mixed{
        if(!is_null($value)){   
            $_SESSION[$key] = encrypt($value);
        }
        return isset($_SESSION[$key]) ? $_SESSION[$key] : '';
    }
}

if(!function_exists('session_get')){
    function session_get(string $key ):mixed{
        return isset($_SESSION[$key])? decrypt($_SESSION[$key]):null;
    }
}

if(!function_exists('session_has')){
    function session_has(string $key ):mixed{
        return isset($_SESSION[$key]);
    }
}

if(!function_exists('session_flash')){
    function session_flash(string $key):mixed{
        $session = decrypt($_SESSION[$key]);
        session_forget($key);
        return $session;
    }
}

if(!function_exists('session_forget')){
    function session_forget(string $key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }
}

if(!function_exists('session_delete_all')){
    function session_delete_all(){
        session_destroy();
    }
}