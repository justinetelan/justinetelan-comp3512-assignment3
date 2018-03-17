<?php
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
header("Location: login.php");
?>