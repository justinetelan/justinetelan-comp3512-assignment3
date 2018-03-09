<?php
/*
    Gateway class for Users in Users table.
*/

class UsersGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT UserID, FirstName,LastName, Address, City, Region, Country, Postal, Phone, Email FROM Users';
    }
    
    protected function getContents() {
        return 'Users.UserID';
    }
    
    protected function getFromTable() {
        return 'Users';
    }    
    
    protected function getPkName() {
        return 'UserID';
    }
}

?>