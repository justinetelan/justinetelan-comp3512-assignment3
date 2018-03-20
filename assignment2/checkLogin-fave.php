<?php
//This page verifies whether user is logged in or not before entering favourites page
session_start();
if(isset($_SESSION['user'])) {
    header("Location: favourites.php");
    
} else if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>