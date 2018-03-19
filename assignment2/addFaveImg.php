<?php

	require_once('config.php');
	// include 'functions/functionsClass.php';
	session_start();
	
	echo $_SESSION['ids'] . '<br>' . $_GET['id'] . '<br>';
	
	$dbImg = new ImagesGateway($connection);
	$imgF = $dbImg -> getFields(Array(0, 1, 2, 6)); // ImageID, UserID, Title, Path
	
	$sql = 'SELECT ' . $imgF . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
	echo $sql . '<br>';
	
	$result = $dbImg -> getById($sql, $_GET['id'], 0);
	// echo $result . '<br>';
	
	
	echo $_SESSION['faveImg'] . '<br>';
	// set($_SESSION['faveImg']);
	array_push($_SESSION['faveImg'], $result);
	echo count($_SESSION['faveImg']);
	header('Location: favourites.php');

?>