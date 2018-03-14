<?php
/*
    Gateway class for ImageDetails table.
*/

class ImagesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT ImageID, Title, Path FROM ImageDetails';
        // return 'SELECT ';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "ImageID"; $data[1] = "ImageDetails.UserID"; $data[2] = "ImageDetails.Title"; $data[3] = "Description";
        $data[4] = "CityCode"; $data[5] = "CountryCodeISO"; $data[6] = "Path";
        
        return $data;
    }
    
    protected function getFromClause() { 
        return 'ImageDetails'; 
    }
    
    protected function getPkName() {
        return 'ImageID';
    }
}

?>