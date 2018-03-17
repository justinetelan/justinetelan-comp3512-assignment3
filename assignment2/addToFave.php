<?php

	if( !isset($_SESSION['id']) ) {
	    $_SESSION['cart'] = new ShoppingCart();
	}
	
	$cart = $_SESSION['cart'];
	
	if( isset($_GET['id']) ) {  
		// create cart item
		$item = new CartItem($_GET['id'], 1);
		$cart -> addItem($item);
		
		// *save updated cart into sesh
		$_SESSION['cart'] = $cart;
		
		// redirect to view cart
		header( 'Location: viewCart.php' );
    }

?>