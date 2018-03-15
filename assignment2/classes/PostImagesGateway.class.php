<?php
/*
    Gateway class for PostImages table.
*/

class PostImagesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return 'SELECT ImageID, PostID FROM PostImages';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "ImageID"; $data[1] = "PostID";
        
        return $data;
    }    
    
    protected function getFromClause() {
        return 'PostImages';
    }
    
    // FIX THIS - has two primary keys
    protected function getPkName() {
        return 'PostID';
    }
    
    
}

?>