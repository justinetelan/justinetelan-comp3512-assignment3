<?php

    function singlePost($connection) {
        
        $db = new PostsGateway($connection);
        
        $result = $db -> getAll();
        
        // echo 'SELECT PostID, UserID, MainPostImage, Message, PostTime FROM Posts';
        
        foreach($result as $row) {
            echo '<strong>PostID = </strong>' . $row['PostID'] . '<br>' .
                    '<strong>UserID = </strong>' . $row['UserID'] . '<br>' .
                    '<strong>MainPostImage = </strong>' . $row['MainPostImage'] . '<br>' .
                    '<strong>Message = </strong>' . $row['Message'] . '<br>' .
                    '<strong>PostTime = </strong>' . $row['PostTime'];
            echo '<hr>';
        }
    }
?>