<?php
//This page verifies whether user is logged in or not before entering user profile page
session_start();
//redirects user to user profile page if user cookie is set
if(isset($_SESSION['user'])){
    header("Location: userProfile.php");
   //redirects user to login page if user cookie is not set 
}else if(!isset($_SESSION['user'])){
    header("Location: login.php");
}

?>