<?php
    
    require_once('config.php');
    session_start();

    $imgList = $_SESSION['faveImg'];
    $count = 0;

    foreach($imgList as $faveImgs) {
        
        if($faveImgs['ImageID'] == $_GET['id']) {
            
            array_splice($imgList, $count, 1);
            $_SESSION['faveImg'] = $imgList;
            
            header('Location: favourites.php');
            
        }

        $count++;
        
    }
    
    
?>