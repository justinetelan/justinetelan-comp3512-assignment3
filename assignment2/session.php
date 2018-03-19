<?php 


require_once('config.php'); 
session_start();


$usrNm =  $_POST['uname'];
$pw =  $_POST['psw'];

 $dbLog= new UsersLoginGateway($connection);
 $dbUse= new UsersGateway($connection);       
        $logF = $dbLog -> getFields(Array(0,1,2,3)); // UserID,UserName, Password, Salt
        $useF = $dbUse -> getFields(Array(0,1,2,3,4,5,6,7,8));
       
       //REFINE statement to retrieve User profile info!!!!!!! 
        $sql = 'SELECT ' . $logF . ' , ' . $useF .
                ' FROM ' . $dbLog -> getFrom() .
                ' JOIN ' . $dbUse->getFrom() .
                ' ON ' . $dbUse->getFrom() . '.' .$dbUse->getPk() .
                ' = ' .$dbLog->getFrom() . '.' .$dbLog->getPk();
        
         $result = $dbLog -> runQuery($sql, null, 0);
         foreach($result as $row) {
        
        
        
        if ($usrNm == $row['UserName']){
             $hash = $pw . $row['Salt'];
            $encp = md5($hash);
            if($encp == $row['Password']){
                unset($_SESSION['error']);
                $_SESSION['user'] = $usrNm;
                $_SESSION['ids'] = $row['UserID'];
                $_SESSION['first'] = $row['FirstName'];
                $_SESSION['last'] = $row['LastName'];
                $_SESSION['address'] = $row['Address'];
                $_SESSION['city'] = $row['City'];
                $_SESSION['region'] = $row['Region'];
                $_SESSION['country'] = $row['Country'];
                $_SESSION['postal'] = $row['Postal'];
                $_SESSION['phone'] = $row['Phone'];
                $_SESSION['email'] = $row['Email'];
                
                $_SESSION['faveImg'] = array(); // TEMPORARY, TESTING THIS
                $_SESSION['favePost'] = array(); // TEMPORARY, TESTING THIS
                
              header("Location: userProfile.php");
                
            }else {
                $_SESSION['error'] = "";
                header("Location: login.php");
            }
            
            
           }else {
             $_SESSION['error'] = "";
             header("Location: checkLogin.php");
        }
        
         }
         


?>