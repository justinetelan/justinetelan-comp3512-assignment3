<?php
/*
    Gateway class for ImageDetails table.
*/

class UsersLoginGateway extends MainGateway {
    public function __construct($connect) {
        parent::__construct($connect);
        
    }
    
    protected function getSelectStatement() {
        return 'SELECT UserID, UserName, Password, Salt FROM ImageDetails';
        // return 'SELECT ';
    }
    
    // store fields into an array
    protected function getData() {
        $data[0] = "UserID"; $data[1] = "UserName"; $data[2] = "Password"; $data[3] = "Salt";
        
        return $data;
    }
    
    protected function getFromClause() { 
        return 'UsersLogin'; 
    }
    
    protected function getOrder() {
        return 'UserName';
    }    
    
    protected function getPkName() {
        return 'UserID';
    }
}

?>