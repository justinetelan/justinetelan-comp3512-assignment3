<?php
/*
    Gateway class for Cities table.
*/

class CitiesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT CityCode, AsciiName, CountryCodeISO, Latitude, Longitude, Population, Elevation, TimeZone FROM Cities';
        // return 'SELECT ';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "AsciiName"; $data[1] = "CountryCodeISO"; $data[2] = "Latitude"; $data[3] = "Longitude";
        $data[4] = "Population"; $data[5] = "Elevation."; $data[6] = "TimeZone"; $data[7] = "Cities.CityCode";
        
        return $data;
    }
    
    protected function getFromClause() { 
        return 'Cities'; 
    }
    
    protected function getOrder() {
        return 'AsciiName';
    }    
    
    protected function getPkName() {
        return 'CityCode';
    }
}

?>