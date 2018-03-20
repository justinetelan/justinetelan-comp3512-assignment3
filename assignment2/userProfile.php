<?php
            session_start();
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
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/general.css" /> 
        <link rel="stylesheet" href="css/information.css" /> 
    
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
            <div class="jumbotron">
                <div class="row">
                    
                    <div class="col-md-8">
                        
                        <?php userProfile(); ?>        
                            
                    </div> <!-- close col-md-8 -->
                        
                        

                    <!--</div>-->
                    
                    
                    
                </div> <!-- close row -->
            </div> <!-- close jumbotron -->
            <?php
            
            // echo "User is: ". $_SESSION['user']. '</br>';
            // echo "User is: ". $_SESSION['ids'];
            // echo "User is: ". $_SESSION['ln'];
            
            
            
            
            
            
            
               
            
            
            
            
            
?>
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