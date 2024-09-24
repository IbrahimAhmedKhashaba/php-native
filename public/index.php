<?php
require_once __DIR__."/../includes/app.php";

// var_dump(db_update('users',[
//     'name'=>'ccccccccccccc',
//     'email'=>'ccccccccccccc@gmail.com',
//     'password'=>'ccccccccccccc',
//     'mobile'=>'3333333333'
// ] , 3)); 

// $encrypt = encrypt('Welcome to my project');
// var_dump(decrypt($encrypt));
// var_dump(db_delete('users', 3)); 

// session('local' , 'ar');

// var_dump(db_find('users', 4)); 

// var_dump(db_first('users', "where id=4")); 

// var_dump(db_get('users', [
//     'name'=> 'hgyghjhjgh',
//     'email'=> 'fdgdfgdfggdf',
//     'password'=> 'dfgdfgfgd',
// ])); 

// set data
// session('test' , 'session is set');

// forget session
// session_forget('test');

// destroy all sessions
// session_delete_all();
// var_dump($_SESSION['test']);
route_init();

if(!empty($GLOBALS['query'])){
    mysqli_free_result($GLOBALS['query']);
}
mysqli_close($GLOBALS['connect']);
ob_end_flush();
