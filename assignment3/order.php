<?php
    //This page is dedicated towards the favourites functionality for the website
    require_once('config.php');
    include 'functions/functionsClass.php';
    
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 3 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    
        <link rel="stylesheet" href="css/captions.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/general.css" /> 
        
        <!-- used for the bootstrap modal -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script src="js/ajax-req.js"></script>-->
        <!--<script src="js/jquery.js"></script>-->
        <script src="js/dropdown.js"></script>
        <script src="js/calculations.js"></script>
    
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
            <h3><b>Order Summary</b></h3>
            <?php 
            // here u are gonna do $_POST[dataString . g] to make unique id
            // include'requestTest.php'; 
            include 'formatOrder.php';
            
            
            
            echo ' <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-2"><label>Size</label></div>
                  <div class="col-md-2"><label>Paper</label></div>
                  <div class="col-md-2"><label>Frame</label></div>
                  <div class="col-md-2"><label>Quantity</label></div>
              </div>
              <br/>';
            $sz = "";
            $pp = "";
            $fr = "";
            $qt = "";
            $sp = "";
            
            if(count($_SESSION['faveImg']) != 0) {
                $i =0;
                foreach($_SESSION['faveImg'] as $img) {
                $pic = '<a href="single-image.php?id=' . $img['ImageID'] . '"><img src="images/square-small/' . $img['Path'] . '" alt="Favourite Image" class="img-circle"></a>';
                if($_GET['size'. $i] == 0){
                    $sz = '5x7';
                }elseif ($_GET['size'. $i] == 1) {
                    $sz = '8x10';
                }elseif ($_GET['size'. $i] == 2) {
                    $sz = '11x14';
                }elseif ($_GET['size'. $i] == 3) {
                    $sz = '12x18';
                }
                
                
                if($_GET['paper'. $i] == 0){
                    $pp = 'Matte';
                }elseif ($_GET['paper'. $i] == 1) {
                    $pp = 'Glossy';
                }elseif ($_GET['paper'. $i] == 2) {
                    $pp = '      Canvas   &nbsp&nbsp   ';
                }
                
                
                if($_GET['frame'. $i] == 0){
                    $fr = 'None';
                }elseif ($_GET['frame'. $i] == 1) {
                   $fr = 'Blonde Maple';
                }elseif ($_GET['frame'. $i] == 2) {
                    $fr =  'Expresso Walnut';
                }elseif ($_GET['frame'. $i] == 3) {
                    $fr =  'Silver Metal';
                }elseif ($_GET['frame'. $i] == 4) {
                    $fr =  'Gold Accent';
                }
                
                
                $qt = $_GET['qty'. $i];
                format($pic, $sz, $pp, $fr, $qt);
                
            
                echo '<br/>';
                
              $i++;  
            }
            }
                if($_GET['ship'] == 0){
                    echo '<div class="col-md-2"></div><div class="col-md-2"></div><div class="col-md-2"></div><div class="col-md-2"></div><b>Standard Shipping</b>';
                }elseif ($_GET['ship'] == 1) {
                    echo '<div class="col-md-2"></div><div class="col-md-2"></div><div class="col-md-2"></div><div class="col-md-2"></div><b>Express  Shipping</b>';
                }
                
                echo '<br/>';
                
            
            ?>
            <div class="container">
         <div class="jumbotron" id="postJumbo">
        <h3><i><b>Thank You For Shopping With Us</b></i></h3>
        </div>   
            
        </div>
        
        <!--<script src="js/jquery.min.js"></script>-->
        <!--<script src="js/bootstrap.min.js"></script>-->
        
        
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