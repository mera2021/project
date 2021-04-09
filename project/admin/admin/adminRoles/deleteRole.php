<?php 
    require '../logic/connection.php';

   $id = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

    $sql = "delete from adminroles where id = ".$id;

    $op = mysqli_query($con,$sql);
    $message = '';
    if($op){ 
          $message = "Record Delete";
    }else{

        $message = "error in delete";

    }


    $_SESSION['message'] = $message;

    header("Location: displayRoles.php");


?>