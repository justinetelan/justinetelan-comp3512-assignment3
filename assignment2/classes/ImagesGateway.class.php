<?php
/*
    Gateway class for Images in ImageDetails table.
*/

class ImagesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT ' . ImagesGateway::getKeys() . ImagesGateway::getFromTable(); //ImageID, Title, Path FROM ImageDetails';
    }
    
    protected function getKeys() {
        return 'ImageID, Title, Path';
    }
    
    protected function getFromTable() { 
        return ' FROM ImageDetails '; 
    }
    
    protected function getPkName() {
        return 'ImageID';
    }
}

?>