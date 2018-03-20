<?php
    
    $country = $_GET['id'];

    // if it doesn't exist or is empty
    if(!isset($country) || empty($country)) {
        header('Location: error.php');
    }
    
    require_once('config.php');
    session_start();
    
    $dbCountry = new CountriesGateway($connection);
    $sql = 'SELECT ' . $dbCountry -> getPk() . ' FROM ' . $dbCountry -> getFrom() . ' WHERE ';
    $checkCountry = $dbCountry -> getById($sql, $country, 0);
    if($checkCountry == null) {
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
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        
    
        <link rel="stylesheet" href="css/captions.css" />
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        
        <link rel="stylesheet" href="css/information.css" />   
        <link rel="stylesheet" href="css/general.css" /> 
        <script src="js/map.js" type="text/JavaScript"></script>
        
    
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
                        <?php countryInfo($connection); ?>
                    </div> <!-- close col-md-8 -->
                        
                        

                    <!--</div>-->
                    
                    <div class="col-md-4">
                        <h3>Related Images</h3>
                        <?php identifyType($connection, "countries"); ?>
                    </div> <!-- close col-md-4 -->
                    
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
        
        <?php
           
            // simpleSearch($connection);
            
        ?>
        
    </body>
    
    
</html>