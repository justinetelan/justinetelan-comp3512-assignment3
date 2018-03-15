<?php
/*
    Gateway class for Continent table.
*/

class ContinentsGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT ContinentCode, ContinentName FROM Continents';
        // return 'SELECT ';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "ContinentCode"; $data[1] = "ContinentName"; $data[2] = "GeoNameId"; 
        
        return $data;
    }
    
    protected function getFromClause() { 
        return 'Continents'; 
    }
    
    protected function getOrder() {
        return 'ContinentName';
    }    
    
    protected function getPkName() {
        return 'ContinentCode';
    }
}

?>