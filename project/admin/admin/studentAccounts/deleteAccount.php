<?php

require '../logic/connection.php';
include '../logic/helperFunctions.php';

$id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

$sql = "delete from student where id = ".$id; 


$op = mysqli_query($con,$sql);


$deleteMessage='';
if($op){

    $deleteMessage = "Record deleted";

}else{

    $deleteMessage = "Error in delet op";
}

$_SESSION['deleteMessage'] = $deleteMessage;

header("Location: displayAccounts.php");

?>