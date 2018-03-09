<?php
/*
    Gateway class for Posts in Posts table.
*/

class PostsGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return 'SELECT PostID, UserID, MainPostImage, Message, PostTime FROM Posts';
    }
    
    protected function getContents() {
        return 'PostID, MainPostImage, Message, PostTime';
    }    
    
    protected function getFromTable() {
        return 'Posts';
    }
    
    protected function getPkName() {
        return 'PostID';
    }
    
    
}

?>