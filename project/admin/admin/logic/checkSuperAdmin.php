<?php 

   if($_SESSION['adminData']['role'] != 1){

    header("Location:".url('index.php'));

   }



?>