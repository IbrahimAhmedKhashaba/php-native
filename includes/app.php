<?php
$helpers =["request" , "routing" , "helper" ,'db' , "session","translation" , "view" ];
foreach($helpers as $helper) {
    require __DIR__."/helpers/".$helper.".php";
}

$connect = mysqli_connect(
    config('database.servername'),
    config('database.username'),
    config('database.password'),
    config('database.database'),
    config('database.port')
);
if(!$connect) {
    die("connection failed ".mysqli_connect_error());
}

// mysqli_close($connect);