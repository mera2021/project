<?php 
    require '../logic/connection.php';
    include '../logic/helperFunctions.php';

   $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    $sql = "delete from subjects where id = ".$id;

    $op = mysqli_query($con,$sql);
    $message = '';
    if($op){ 
          $message = "Record Delete";
    }else{

        $message = "error in delete";

    }


    $_SESSION['message'] = $message;

    header("Location: display.php");


?>