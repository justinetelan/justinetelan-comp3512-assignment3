<?php
    
    require_once('config.php');
    session_start();

    $postList = $_SESSION['favePost'];
    $count = 0;

    foreach($postList as $favePosts) {
        
        if($favePosts['PostID'] == $_GET['id']) {
            
            array_splice($postList, $count, 1);
            
            $_SESSION['favePost'] = $postList;
            
            header('Location: favourites.php');
            
        }

        $count++;
        
    }
    
    
?>