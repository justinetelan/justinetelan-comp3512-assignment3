<?php
/*
    Gateway class for Posts in Posts table.
*/

class PostsGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT PostID, MainPostImage, Message, PostTime FROM Posts';
    }
    
    protected function getPkName() {
        return 'PostID';
    }
}

?>