<?php

$server="localhost";
$username= "root";
$password="";
$db= "info";

$con= mysqli_connect($server,$username,$password, $db); 
if(!$con){
    die("connection failed to database due to ". mysqli_connect_error());
}

?>


