CityCode       | int(11)      | NO   | PRI | NULL    |       |
| AsciiName      | varchar(255) | YES  |     | NULL    |       |
| CountryCodeISO | varchar(2)   | YES  | MUL | NULL    |       |
| Latitude       | double       | YES  |     | NULL    |       |
| Longitude      | double       | YES  |     | NULL    |       |
| Population     | int(11)      | YES  |     | NULL    |       |
| Elevation      | int(11)      | YES  |     | NULL    |       |
| TimeZone       | varchar(255) | YES  |     | NULL    

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