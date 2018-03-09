<?php
/*
    Gateway class for Posts in Posts table.
*/

class PostsGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT ' . PostsGateway::getKeys() . PostsGateway::getFromTable(); //PostID, UserID, MainPostImage, Message, PostTime FROM Posts';
    }
    
    protected function getKeys() {
        return 'PostID, UserID, MainPostImage, Message, PostTime';
    }    
    
    protected function getFromTable() {
        return ' FROM Posts ';
    }
    
    protected function getPkName() {
        return 'PostID';
    }
    
    
}

?>