<?php
//Single image page
    $img = $_GET['id'];
    
    if(!isset($img) || empty($img)) {
        header('Location: error.php');
    }
    
    require_once('config.php'); 
    session_start();
    
    $dbImg = new ImagesGateway($connection);
    $sql = 'SELECT ' . $dbImg -> getPk() . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
    $checkImg = $dbImg -> getById($sql, $img, 0);
    if($checkImg == null) {
        header('Location: error.php');
    }
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
    session_start();

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
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
    
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
        
        <main class="container">
            <div class="row">
                
                <?php include 'includes/left.inc.php'; ?>
                
                <div class="col-md-10">
                    <div class="row">
                        
                        <?php 
                        
                            // singleImage($pdo); 
                            singleImg($connection);
                            // echo $_SESSION['ids'];
                        ?>
                        
                        <!-- USE JS TO SHOW TEMP MESSAGE ONCE ADDED -->
                        <div class="hiddenAdd"></div>
                        
                        <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                            <div class='btn-group' role='group'>
                                <?php addFavePost($connection, "singleImg"); ?>
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