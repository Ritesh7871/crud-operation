<?php
$servername="localhost";
$username="root";
$password="";
$database="test1";

$con = mysqli_connect("$servername","$username","$password","$database");
if(!$con){
    die('can not connect:'. mysqli_connect_error());
}else{
    
}



?>