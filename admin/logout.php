<?php

   $con=mysqli_connect('localhost','root');
   mysqli_select_db($con,'sale');

   session_start();
   
   session_unset();

   session_destroy();

   header('location:../a_Login.php');
  
    alert("logout successfully" .$_SESSION['username']. "</br>");
    
?>
