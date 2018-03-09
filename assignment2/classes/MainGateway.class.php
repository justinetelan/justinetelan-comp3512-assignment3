<?php
    
    abstract class MainGateway {
        protected $connection;
        
        public function __construct($connect) {
            if(is_null($connect)) {
                throw new Except("Connection is null");
            }
            
            $this -> connection = $connect;
        }
        
        // retrieve table name
        abstract protected function getSelectStatement();
        
        // retrieve keys from table
        abstract protected function getKeys();
        
        // get FROM clause
        abstract protected function getFromTable();
        
        // define sort order (is this needed or nah)
        // abstract protected function getOrder();
        
        // primary keys in db
        abstract protected function getPkName();
        
        // get data from joined tables
        public function joinTables($table) {
            return 'JOIN ' . $table;
        }
        
        public function getAll($sortFields=null) {
            $sql = $this -> getSelectStatement(); // retrieve select function
            
            // sort order, if required
            if(!is_null($sortFields)) {
                $sql .= " ORDER BY " . $sortFields;
            }
            
            $statement = DatabaseHelp::runQuery($this->connection, $sql, null); // run query, pass pdo connection and sql
            return $statement -> fetchAll();
        }
        
        // returns sorted data based on specified sort order
        public function findAllSorted($sortOrder) {
            $sql = $this -> getSelectStatement() . ' ORDER BY ' . $this -> getOrder();
            
            $statement = DatabaseHelp::runQuery($this->connection, $sql, null);
            return $statement -> fetchAll();
        }
        
        // returns data for specified ID
        public function getById($id) {
            $sql = $this -> getSelectStatement() . ' WHERE ' . $this -> getPkName() . '=:id';
            $statement = DatabaseHelp::runQuery($this->connection, $sql, Array(':id' => $id)); // UNSURE WHY ARRAY
            return $statement -> fetch();
        }
    }

?>