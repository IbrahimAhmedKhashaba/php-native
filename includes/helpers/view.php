<?php
if(!function_exists('view')){
    function view($path , array $vars=null){
        $full_path ='';
        $current_paths = explode('.' , $path);
        foreach($current_paths as $current){
            if(end($current_paths) != $current){
                $full_path .= '/'.$current;
            }
        }
        $file = config('view.path').$full_path.'/'.end($current_paths).'.php';
        if(file_exists($file)){
            if(!is_null($vars) && is_array($vars)){
                foreach($vars as $key=>$value){
                    ${$key} = $value;
                }
            }
            include $file;
        } else{
            include config('view.path').'/404.php';
        }
        return null;
        
   
    }
}
// view('layout.header');