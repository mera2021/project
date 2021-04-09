<?php 
   
   if(!isset($_SESSION['adminData'])){

    header("Location:".url('login.php'));
   }

?>