<?php
/*
    Class for favourites list of users.
*/

    abstract class Favourites {
        
        protected $connection;
        
        public function __construct($connect) {
            if(is_null($connect)) {
                throw new Except("Connection is null");
            }
            
            $this -> connection = $connect;
        }
    
        abstract protected function addToFave();
        
        abstract protected function removeFrFave();
    
}

?>