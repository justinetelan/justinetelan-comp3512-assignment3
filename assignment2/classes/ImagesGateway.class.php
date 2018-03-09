<?php
/*
    Gateway class for Images in ImageDetails table.
*/

class ImagesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT ImageID, Title, Path FROM ImageDetails';
    }
    
    protected function getContents() {
        return 'ImageID, ImageDetails.Title, Path';
    }
    
    protected function getFromTable() { 
        return 'ImageDetails'; 
    }
    
    protected function getPkName() {
        return 'ImageID';
    }
}

?>