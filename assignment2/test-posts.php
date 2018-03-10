<?php
    
    require_once('config.php');
    
    $dbPost = new PostsGateway($connection);
    $dbImg = new ImagesGateway($connection);
    
    // get the fields you need here
    $postF = $dbPost -> getFields(Array(0, 1, 4));
    $imgF = $dbImg -> getFields(Array(0, 2, 3));
    
    $sql = 'SELECT ' . $postF . ', ' . $imgF . 
            ' FROM ' . $dbPost->getFrom() . ', ' . $dbImg->getFrom() .
            ' WHERE ' . $dbPost->getFrom() . '.' . $dbPost->getFields(Array(2)) .
            ' = ' . $dbImg->getFrom() . '.' . $dbImg->getPk();
    
    echo $sql . '<br>';
    
    $result = $dbPost -> runQuery($sql, null, 0);
    
    // foreach($result as $row) {
    //     echo $row['Description'] . '<br>';
    // }

?>