<?php
/*
    Gateway class for Users table.
*/

class UsersGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT UserID, FirstName,LastName, Address, City, Region, Country, Postal, Phone, Email FROM Users';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "FirstName"; $data[1] = "LastName"; $data[2] = "Address"; $data[3] = "City";
        $data[4] = "Region"; $data[5] = "Country"; $data[6] = "Postal"; $data[7] = "Phone";
        $data[8] = "Phone"; $data[9] = "Email"; $data[10] = "Privacy";
        
        return $data;
    }
    
    protected function getFromClause() { 
        return 'Users'; 
    }
    
    protected function getPkName() {
        return 'UserID';
    }
    
}

?>