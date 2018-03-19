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
	$_SESSION['faveP'] = "";
	$count = 1;
	
	// check if user is logged in
	if(isset($_SESSION['user'])) {
		if(count($_SESSION['favePost']) != 0) { // if there are already post favourites
			
			foreach($_SESSION['favePost'] as $currFavePost) {
				
				if($currFavePost['PostID'] == $result['PostID']) { // if it's already in favourites
					header('Location: single-post.php?id=' . $_GET['id']);
				} else if($count == count($_SESSION['favePost'])) {
					array_push($_SESSION['favePost'], $result);
					header('Location: favourites.php');	
				}
				$count++;
			}
		} else {
			array_push($_SESSION['favePost'], $result);
			header('Location: favourites.php');	
		}
		
	} else if(!isset($_SESSION['user'])) {
		header("Location: login.php");
	}
	
	// echo $_SESSION['favePost'] . '<br>';
	// array_push($_SESSION['favePost'], $result);
	// // echo count($_SESSION['favePost']);
	// header('Location: favourites.php');

?>