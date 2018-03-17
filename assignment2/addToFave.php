<?php
    
    require_once('config.php');
    session_start();
    include 'functions/functionsClass.php';
    
    // echo 'this is: ' . $_SESSION['ids'] . '<br>';
    // echo 'session set: ' . isset($_SESSION['ids']) . '<br>';
    
	if( !isset($_SESSION['ids']) ) {
	    $_SESSION['fave'] = new Favourites();
	   // echo 'hello';
	}
	
	$faveI = new Favourites();//$_SESSION['fave'];
	
	if( isset($_GET['id']) ) {  
		// create cart item
		$item = new FaveItem($_GET['id']);
		
		print_r($item);
		echo '<br>';
		
		// get all info from this item (image or post)
		
		$faveI -> addToFave($connection, $item);
		
		// *save updated cart into sesh
		$_SESSION['fave'] = $faveI;
		
		// redirect to view cart
		header( 'Location: favourites.php' );
    }

?>