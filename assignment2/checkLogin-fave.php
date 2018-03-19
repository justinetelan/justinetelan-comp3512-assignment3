<?php
session_start();
if(isset($_SESSION['user'])) {
    header("Location: favourites.php");
    
} else if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>