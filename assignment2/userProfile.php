<?php
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
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
        
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
        <main class="container">
            <?php
            
            // echo "User is: ". $_SESSION['user']. '</br>';
            // echo "User is: ". $_SESSION['ids'];
            // echo "User is: ". $_SESSION['ln'];
            
                echo 'User: '.$_SESSION['user']. '</br>';
                echo 'ID: '.$_SESSION['ids']. '</br>';
                echo 'FirstName: '.$_SESSION['first']. '</br>';
                echo 'LastName: '.$_SESSION['last']. '</br>';
                echo 'Address: '.$_SESSION['address']. '</br>';
                echo 'City: '.$_SESSION['city']. '</br>';
                echo 'Region: '.$_SESSION['region']. '</br>';
                echo 'Postal: '.$_SESSION['postal']. '</br>';
                echo 'Phone: '.$_SESSION['phone']. '</br>';
                echo 'Email: '.$_SESSION['email']. '</br>';
            
            
            
            
            
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