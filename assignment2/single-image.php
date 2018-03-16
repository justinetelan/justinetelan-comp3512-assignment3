<?php

    $img = $_GET['id'];
    
    if(!isset($img) || empty($img)) {
        header('Location: error.php');
    }
    
    require_once('config.php'); 
    // try {
    //   $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   $checkImg = "SELECT ImageID FROM ImageDetails WHERE ImageID = :image";
    //   $statement = $pdo -> prepare($checkImg);
    //   $statement -> bindValue(':image', $img);
    //   $statement -> execute();
    //   $res = $statement -> fetch();
      
    //   if($res == null) {
    //       header('Location: error.php');   
    //   }
      
    // }
    // catch (PDOException $e) {
    //   die( $e->getMessage() );
    // }
    
    // include 'functions/functions.php';
    include 'functions/functionsClass.php';

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 2 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        
    
        <link rel="stylesheet" href="css/captions.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
        
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
        <main class="container">
            <div class="row">
                
                <?php include 'includes/left.inc.php'; ?>
                
                <div class="col-md-10">
                    <div class="row">
                        
                        <?php 
                        
                            // singleImage($pdo); 
                            singleImg($connection);
                        ?>
                        
                        <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span></button>
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-save' aria-hidden='true'></span></button>
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
                            </div>
                        </div> <!-- close button class -->
                        
                        <!--<div id='map' style='width:95%;height:400px;'></div>-->
                        
                        <?php mapp($connection, "image"); ?>
                        
                        
                        
                        </div> <!-- close div col-md-4 within singleImage() -->                  
                            
                    </div>
                    
                </div>
                
            </div>
            
        </main>
        
        
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