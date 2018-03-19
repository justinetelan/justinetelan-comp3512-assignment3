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
	$_SESSION['faveP'] = "";
	$count = 1;
	
	if(count($_SESSION['faveImg']) != 0) {
		
		foreach($_SESSION['faveImg'] as $currFaveImg) {
		
			if($currFaveImg['ImageID'] == $result['ImageID']) {
				
				header('Location: single-image.php?id=' . $_GET['id']);
				echo '<h1>this already exists</h1>'; // this isn't showing, FIX
				
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
	
?>