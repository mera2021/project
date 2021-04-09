<?php    
   require 'logic/connection.php';
   include 'logic/helperFunctions.php';
   

   session_destroy();
    header("Location:".url('login.php'));
   

?>