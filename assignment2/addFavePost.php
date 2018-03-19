<?php

	require_once('config.php');
	// include 'functions/functionsClass.php';
	session_start();
	
	echo $_SESSION['ids'] . '<br>' . $_GET['id'] . '<br>';
	
	$dbPost = new PostsGateway($connection);
	$dbImg = new ImagesGateway($connection);
	$postF = $dbPost -> getFields(Array(0, 1, 2, 3)); // PostID, UserID, MainPostImage, Title
	$imgF = $dbImg -> getFields(Array(0, 6)); // ImageID, Path
	
	$sql = 'SELECT ' . $postF . ', ' . $imgF . ' FROM ' . 
			$dbPost -> getFrom() . ' JOIN ' . $dbImg -> getFrom() . 
			' WHERE ' . $dbPost -> getFields(Array(2)) . ' = ' . $dbImg -> getPk() .
			' AND ';
	echo $sql . '<br>';
	
	$result = $dbPost -> getById($sql, $_GET['id'], 0);
	// echo $result . '<br>';
	
	
	echo $_SESSION['favePost'] . '<br>';
	array_push($_SESSION['favePost'], $result);
	// echo count($_SESSION['favePost']);
	header('Location: favourites.php');

?>