<?php
    //Single user page
    $user = $_GET['id'];
    
    if(!isset($user) || empty($user)) {
        header('Location: error.php');
    }
    
    require_once('config.php'); 
    session_start();
    
    $dbUser = new UsersGateway($connection);
    // retrieve UserID
    $sql = 'SELECT ' . $dbUser -> getPk() . ' FROM ' . $dbUser -> getFrom() . ' WHERE ';
    $checkUser = $dbUser -> getById($sql, $user, 0);
    if($checkUser == null) {
        header('Location: error.php');
    }
    
    include 'functions/functionsClass.php';

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 2 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        
    
        <link rel="stylesheet" href="css/captions.css" />
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/information.css" />  
        <link rel="stylesheet" href="css/general.css" /> 
        <!--<link rel="stylesheet" href="css/single-country.css" />   -->
    
    </head>
    
    <body>
        
        <header>
            <?php 
            
            if(isset($_SESSION['user'])){
                include 'includes/headerLogout.inc.php'; 
                
            }else if (!isset($_SESSION['user'])){
                include 'includes/header.inc.php'; 
            }
            
            ?>
        </header>
        
        <div class="container">
            
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-8">
                        <?php singleUser($connection); ?>
                    </div> <!-- close col-md-8 -->
                
                    
                    <div class="col-md-4">
                        <h3>Related Images</h3>
                        <?php identifyType($connection, "users"); ?>
                    </div> <!-- close col-md-8 -->
                
                </div> <!-- close row -->
                
            </div> <!-- close jumbotron -->
        
        </div>
        
        
        <footer>
            <div class="container-fluid">
                        <div class="row final">
                    <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                    <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
                </div>            
            </div>
        </footer>
        
        
        
    </body>
    
    
</html>