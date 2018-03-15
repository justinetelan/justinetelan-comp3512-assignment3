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
        abstract protected function getData();
        
        // get FROM clause
        abstract protected function getFromClause();
        
        // define sort order (is this needed or nah)
        abstract protected function getOrder();
        
        // primary keys in db
        abstract protected function getPkName();
        
        public function runQuery($sql, $arr, $fetch) {
            
            if($fetch == 0) {
                $statement = DatabaseHelp::runQuery($this->connection, $sql, $arr);
                echo 'works fetch all' . '<br>';
                return $statement -> fetchAll();
            } else if($fetch == 1) {
                $statement = DatabaseHelp::runQuery($this->connection, $sql, $arr);
                echo 'works fetch' . '<br>';
                return $statement -> fetch();
            }
        }
        
        // get data from joined tables
        public function getFields($keys=array()) {
            $fieldArr = $this->getData();
            $sql = ''; 
            $outer = 0; $inner = 0;
            
            // iterate thru $keys aka indexes you want
            while($outer < count($keys)) {
                
                // iterate thru $fieldArr - array containing all fields
                while($inner < count($fieldArr)) {
                    
                    // add onto $sql string if match
                    if($fieldArr[$inner] == $fieldArr[$keys[$outer]]) {
                        $sql .= $fieldArr[$inner];
                    }
                    
                    $inner++;
                    
                }
                
                $outer++;
                $inner = 0; // reset it
                
                // add comma if loop hasn't reached end of $keys array
                if($outer != count($keys)) {
                    $sql .= ', ';
                }
                
            }
            
            return $sql;
        }
        
        public function getFrom() {
            return $this -> getFromClause();
        }
        
        public function getPk() {
            return $this -> getPkName();
        }
    
        public function getAll($sortFields=null) {
            $sql = $this -> getSelectStatement(); // retrieve select function
            
            // sort order, if required
            if(!is_null($sortFields)) {
                $sql .= " ORDER BY " . $sortFields;
            }
            
            // $this -> runQuery($sql, null, 0);
            
            $statement = DatabaseHelp::runQuery($this->connection, $sql, null); // run query, pass pdo connection and sql
            return $statement -> fetchAll();
        }
        
        // returns sorted data based on specified sort order
        public function findAllSorted($sql, $type) {//$sortOrder) {
            
            if($type == "orderBy") {
                $sql = $sql . ' ORDER BY ' . $this -> getOrder();
            } else if($type == "groupBy") {
                $sql = $sql . ' GROUP BY ' . $this -> getOrder();
            } else if($type == "both") {
                $sql = $sql . ' GROUP BY ' . $this -> getOrder() .
                        ' ORDER BY ' . $this -> getOrder();
                // echo '<option>' . $sql . '</option>';
            }
            
            // $this -> runQuery($sql, null, 0);
            $statement = DatabaseHelp::runQuery($this->connection, $sql, null);
            return $statement -> fetchAll();
            
            // echo '<option>' . $sql . '</option>';
        }
        
        // returns data for specified ID
        public function getById($sql, $id, $fetch) {
            $sql = $sql . $this -> getPkName() . '=:id';
            
            $statement = DatabaseHelp::runQuery($this->connection, $sql, Array(':id' => $id)); // UNSURE WHY ARRAY
            
            if($fetch == 0) {
                return $statement -> fetch();
            } else if($fetch == 1) {
                return $statement -> fetchAll();
            }
            // echo $sql;
        }
    }

?>