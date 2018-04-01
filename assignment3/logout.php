<?php
//This page is dedicated towards unsetting user profile values and logs user out of their user profile
//unsets cookies
session_start();
unset($_SESSION['user']);
unset($_SESSION['ids']);
unset($_SESSION['first']);
unset($_SESSION['last']);
unset($_SESSION['address']);
unset($_SESSION['city']);
unset($_SESSION['region']);
unset($_SESSION['postal']);
unset($_SESSION['phone']);
unset($_SESSION['email']);
unset($_SESSION['error']);
//deletes content in favourites page
unset($_SESSION['faveImg']); 
unset($_SESSION['favePost']); 

header("Location: login.php");
?>