<?php
   include('connect.inc');
   session_start();
   
   $user_check = $_SESSION['username'];
   
   $result =$conn -> query("select username from userAccounts where username = '$user_check' ");
   
   
   
   if(!isset($_SESSION['username'])){
      header("location:login.php");
   }
?>
