<?php
    
    require_once('config.php'); 
    include 'functions/functionsClass.php';

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
        
        <link rel="stylesheet" href="css/single-country.css" />   
        <script src="js/single-country.js" type="text/JavaScript"></script>
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
        
        <div class="container">
            
            <div class="jumbotron">
                
                <div class="row">
                    
                    <div class="col-md-8">
                        
                        <h3>Country Information</h3>
                        <div id="map"></div>
                        <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIZnr66nMz2I-p9XM2Cl4bUA4fzVjMgwE&callback=initMap">
                        </script>
                        <?php
                        
                            countryInfo($connection);
                            
                        ?>
                    </div>
                    
                    <div class="col-md-4">
                        <h3>Related Images</h3>
                    </div>
                </div>
            </div>
        
            <?php 
            
                // singleHeader($pdo, "countries"); 
                
            ?>
        
            
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