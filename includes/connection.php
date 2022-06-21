<?php 

$server="localhost";
$user="root";
$password="root";
$database="car_bargain";

$connection = mysqli_connect($server,$user,$password,$database);
if(!$connection)
die("couldn't connect to mysql server");
