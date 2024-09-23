<?php
/**
 * 
 * Exception Handling URL pages
 */
$GET_ROUTES = isset($routes['GET'])?$routes['GET']:[];
if(!isset($_POST['_method']) && !is_null(segment()) && !in_array(segment(),array_column($GET_ROUTES,'segment'))){
    view('404');
    exit();
}