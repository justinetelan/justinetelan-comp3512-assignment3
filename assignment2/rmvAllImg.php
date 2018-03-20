<?php
//THis page removes all the image posts in favourite page for images or posts
    session_start();
    
    $imgList = $_SESSION['faveImg']; $postList = $_SESSION['favePost'];
    
    if($_GET['id'] == 0) { // images
        
        array_splice($imgList, 0, count($imgList));
        $_SESSION['faveImg'] = $imgList;
        header('Location: favourites.php');
        
    } else if($_GET['id'] == 1) { // posts
        array_splice($postList, 0, count($postList));
        $_SESSION['favePost'] = $postList;
        header('Location: favourites.php');
    }
    
?>