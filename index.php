<?php
require_once __DIR__."/includes/app.php";
ob_start();
session_start([
    'cookie_lifetime'=>config('session.expiration_timeout')
]);
require_once __DIR__."/routes/web.php";
require_once __DIR__."/includes/exception_error.php";
// var_dump(db_update('users',[
//     'name'=>'ccccccccccccc',
//     'email'=>'ccccccccccccc@gmail.com',
//     'password'=>'ccccccccccccc',
//     'mobile'=>'3333333333'
// ] , 3)); 



// var_dump(db_delete('users', 3)); 


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
// ob_end_clean();
ob_end_flush();
