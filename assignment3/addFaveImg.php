<?php

	require_once('config.php');
	include 'functions/functionsClass.php';
	
	session_start();
	
	echo $_SESSION['ids'] . '<br>' . $_GET['id'] . '<br>';
	
	$dbImg = new ImagesGateway($connection);
	$imgF = $dbImg -> getFields(Array(0, 1, 2, 6)); // ImageID, UserID, Title, Path
	
	$sql = 'SELECT ' . $imgF . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
	echo $sql . '<br>';
	
	$result = $dbImg -> getById($sql, $_GET['id'], 0);
	$_SESSION['faveI'] = "";
	$count = 1;
	
	// check if user is logged in
	if(isset($_SESSION['user'])) {
		if(count($_SESSION['faveImg']) != 0) { // if there are already image favourites
		
			foreach($_SESSION['faveImg'] as $currFaveImg) {
			
				if($currFaveImg['ImageID'] == $result['ImageID']) { // if it's already in favourites
					echo 'hello';
					header('Location: single-image.php?id=' . $_GET['id']);
					
				} else if($count == count($_SESSION['faveImg'])) {
					array_push($_SESSION['faveImg'], $result);
					header('Location: favourites.php');	
				}
				$count++;
			}	
		
		} else {
			array_push($_SESSION['faveImg'], $result);
			header('Location: favourites.php');	
		}
	} else if(!isset($_SESSION['user'])) {
		header("Location: login.php");
	}
	
?>