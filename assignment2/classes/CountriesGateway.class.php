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
    
    protected function getKeys() {
        return '';
    }
    
    protected function getFromTable() {
        return '';
    }
    
    protected function getPkName() {
        return 'ISO';
    }
}

?>