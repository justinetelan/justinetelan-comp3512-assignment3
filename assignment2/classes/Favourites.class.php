<?php
/*
    Class for favourites list of users.
*/

class Favourites {
    
    public $arrayPost;
    public $arrayImg;
    
    public function viewAll($type) {
        
        print_r($this->arrayImg);
        
        echo count($this->arrayImg);
        
        if($type == "img") {
            
            // foreach($this->arrayImg as $faveImg) {
            //     echo $faveImg['ImageID'] . ' ' . $faveImg['Title'] . ' ' . $faveImg['Path'];
            // }
                
        }
        
        
        
        // echo '<h1>fuck not working</h1>';
        
    }
    
    public function addToFave($connection, $item) {
        
        // get all info here
        // $dbU = new UsersGateway($connection);
        
        // $array = [];
        
        if($type == "img") {
            
            $dbImg = new ImagesGateway($connection);
            $imgF = $dbImg -> getFields(Array(0, 2, 6)); // ImageID, Title, Path
            
            $sql = 'SELECT ' . $imgF . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
            $result = $dbImg -> getById($sql, $_GET['id'], 0);
            
            // echo '<hr>' . $imgF . '<br>' . $sql . '<br>';
            
            // echo $result['ImageID'] . ' ' . $result['Title'] . ' ' . $result['Path'] . '<br>';
            
            array_push($this->arrayImg, $result);
            
        } else if($type == "post") {
            
        }
        
        // array containing an array
        // $array = [$result];
        // array_push($this->array, $result);
        // echo $array;
        // print_r($this->array);
        
        // $this->viewAll();
        
    }
    
    public function removeFrFave() {
        
    }
    
}

?>