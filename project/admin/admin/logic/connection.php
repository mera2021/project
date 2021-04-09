<?php

session_start();

$server = "localhost";
$userName = "root";
$password = "";
$dbName = "project";

$con = mysqli_connect($server , $userName , $password , $dbName);


if (!$con){
    die('Error in connection'.mysqli_connect_error());
}



/*
function fetchdata ($sql){

    global $con;

    $op = mysqli_query($con,$sql);

    return $op;

}
*/

?>