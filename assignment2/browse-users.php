<?php 

    require_once('config.php'); 
    session_start();
    // try {
    //   $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
    //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    // }
    // catch (PDOException $e) {
    //   die( $e->getMessage() );
    // }
    
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
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        
        <link rel="stylesheet" href="css/browse-pages.css" />   
    
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
               
                <div class="col-md-12">
                    <div> <!--class="panel panel-info">-->
                        <div>
                            <ul class="header">
                                <li id="image"><img src="images/misc/browse_users.jpg" class="img-circle" alt="View Countries" title="View Countries" /></li>
                                <li id="title">List of Users</li>
                                <!--<h2>Countries</h2>-->
                            </ul>
                            
                        </div>
                        
                        <?php browseUsers($connection); ?>
                        
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