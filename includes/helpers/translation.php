<?php 
if(!function_exists('trans')){
    function trans(string $key = null , string $default = null): string{
        $trans = explode('.' , $key);
        if(session_has('local')) {
            $default = session_get('local');
        } else {
            $default = !empty(config('lang.default')) ? config('lang.default'): config('lang.fallback');
        }
        $path = config('lang.path')."/".$default."/".$trans[0].".php";
        if(file_exists($path) && count($trans) > 0){
            $result = include $path;
            // var_dump($path);
            return isset($result[$trans[1]]) ? $result[$trans[1]]: $key;
        }
        return '';
    }
}

if(!function_exists('set_local')){
    function set_local(string $lang = null){
        session('local' , $lang);
    }
}



// trans('main.home');
