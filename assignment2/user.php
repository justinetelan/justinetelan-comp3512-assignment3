<?php 


echo $_POST['uname']. " ";
echo $_POST['psw'];

 $dbLog= new UsersLogin($connection);
        
        $logF = $dbLog -> getFields(Array(8,)); // FirstName, LastName
        
        $sql = 'SELECT ' . $logF . 
                ' FROM ' . $dbLog -> getFrom() .
                ' WHERE ' ;
        
        $result = $dbLog -> getById($sql, $_GET['id'], 0);
        

?>