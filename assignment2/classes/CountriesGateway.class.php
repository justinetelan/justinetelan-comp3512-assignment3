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
    
    protected function getContents() {
        return '';
    }
    
    protected function getFromTable() {
        return 'Countries';
    }
    
    protected function getPkName() {
        return 'ISO';
    }
}

?>