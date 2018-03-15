<?php
/*
    Gateway class for Countries in Countries table.
*/

class CountriesGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
    }
    
    protected function getSelectStatement() {
        return 'SELECT ISO, CountryName, Capital, Area, Population, Continent, CurrencyName, CountryDescription FROM Countries';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "Countries.ISO"; $data[1] = "ISONumeric"; $data[2] = "CountryName"; $data[3] = "Capital"; $data[4] = "CityCode";
        $data[5] = "Area"; $data[6] = "Population"; $data[7] = "Continent"; $data[8] = "TopLevelDomain"; $data[9] = "CurrencyCode";
        $data[10] = "CurrencyName"; $data[11] = "PhoneCountryCode"; $data[12] = "Languages"; $data[13] = "Neighbours"; $data[14] = "CountryDescription";
        
        return $data;
    }    
    
    protected function getFromClause() {
        return 'Countries';
    }
    
    protected function getOrder() {
        return 'CountryName';
    }
    
    protected function getPkName() {
        return 'ISO';
    }
}

?>