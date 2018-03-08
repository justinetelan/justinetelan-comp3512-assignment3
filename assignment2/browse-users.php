<?php 

    require_once('config.php'); 
    try {
      $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
    catch (PDOException $e) {
      die( $e->getMessage() );
    }
    
    include 'functions/functions.php';
    
    
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 1 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        
    
        <link rel="stylesheet" href="css/captions.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
        
        <link rel="stylesheet" href="css/browse-pages.css" />   
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
        <main class="container">
            
            <div class="row">
               
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Users</div>
                        
                        <?php browseUsers($pdo); ?>
                        
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