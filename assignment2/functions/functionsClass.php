<?php

    function singlePost($connection) {
        
        $post = new PostsGateway($connection);
        $img = new ImagesGateway($connection);
        $user = new UsersGateway($connection);
        
        $result = $post -> joinTables(Array($img, $user));
        
        echo '<br>';
        
        // foreach($result as $row) {
        //     echo '<strong>Path = </strong>' . $row['Path'] . '<br>';
        // }
        
        // echo '<img src="images/medium/' . $result['Path'] . "'>";
        
        
        // $result = $db -> getAll();
        
        // echo 'SELECT PostID, UserID, MainPostImage, Message, PostTime FROM Posts';
        
        // foreach($result as $row) {
        //     echo '<strong>PostID = </strong>' . $row['PostID'] . '<br>' .
        //             '<strong>UserID = </strong>' . $row['UserID'] . '<br>' .
        //             '<strong>MainPostImage = </strong>' . $row['MainPostImage'] . '<br>' .
        //             '<strong>Message = </strong>' . $row['Message'] . '<br>' .
        //             '<strong>PostTime = </strong>' . $row['PostTime'];
        //     echo '<hr>';
        // }
    }
?>