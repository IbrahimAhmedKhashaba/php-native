<?php 

if(!function_exists('storage')){
    function storage($path){

    }
}

if(!function_exists(function: 'store_file')){
    function store_file(array $from , string $to): bool{
        if(isset($from['tmp_name'])){
            $to_path = '/'.ltrim($to , '/');
            $path = config('files.storage_files_path').$to_path;
            $ex_path = explode('/' , $path);
            $end_file = end($ex_path);
            $check_path = str_replace($end_file , '' , $path);
            if(!empty($check_path)){
                mkdir($check_path, 0777, true);
            }
            move_uploaded_file($from['tmp_name'] , $path);
            return true;
        }
        return false;
    }
}