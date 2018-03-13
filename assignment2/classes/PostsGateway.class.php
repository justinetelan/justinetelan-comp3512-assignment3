<?php
/*
    Gateway class for  Posts table.
*/

class PostsGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return 'SELECT PostID, UserID, Title, MainPostImage, Message, PostTime FROM Posts';
        // return 'SELECT ';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "PostID"; $data[1] = "UserID"; $data[2] = "MainPostImage";
        $data[3] = "Posts.Title"; $data[4] = "Message"; $data[5] = "PostTime";
        
        return $data;
    }    
    
    protected function getFromClause() {
        return 'Posts';
    }
    
    protected function getPkName() {
        return 'PostID';
    }
    
    
}

?>