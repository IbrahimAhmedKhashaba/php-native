<?php
if(!function_exists('request')){
    function request (string $request = null){
        if(isset($_FILES[$request]) && !empty($_FILES['image'])){
            return $_FILES[$request];
        }
        return isset($_REQUEST[$request]) ? $_REQUEST[$request] : null;
    }
}