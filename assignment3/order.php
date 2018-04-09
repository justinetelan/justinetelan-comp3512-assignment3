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
            
            <?php 
            // here u are gonna do $_POST[dataString . g] to make unique id
            // include'requestTest.php'; 
            include 'formatOrder.php';
            echo '<div class="row">
                  <div class="col-md-2"><label><b>Size</b></label></div>
                  <div class="col-md-2"><label><b>Paper</b></label></div>
                  <div class="col-md-2"><label><b>Frame</b></label></div>
                  <div class="col-md-2"><label><b>Quantity</b></label></div>';        
        
         echo '</div>';
            $length = $_GET['total'];
            $sz = "";
            $pp = "";
            $fr = "";
            $qt = "";
            $sp ="";
            // echo "DATA: ". $_GET['qty'. $length];
            
            for($i = 0; $i < $length; $i++){
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
                    $pp ='Matte';
                }elseif ($_GET['paper'. $i] == 1) {
                    $pp = 'Glossy';
                }elseif ($_GET['paper'. $i] == 2) {
                    $pp = 'Canvas';
                }
                
                
                if($_GET['frame'. $i] == 0){
                    $fr =  'None';
                }elseif ($_GET['frame'. $i] == 1) {
                    $fr =  'Blonde Maple';
                }elseif ($_GET['frame'. $i] == 2) {
                    $fr =  'Expresso Walnut';
                }elseif ($_GET['frame'. $i] == 3) {
                    $fr =  'Silver Metal';
                }elseif ($_GET['frame'. $i] == 4) {
                    $fr = 'Gold Accent';
                }
                
                $qt = $_GET['qty'. $i];
                
                echo '<br/>';
                format($sz, $pp, $fr, $qt);
                
            }
                if($_GET['ship'] == 0){
                    $sp = 'Standard Shipping';
                }elseif ($_GET['ship'] == 1) {
                    $sp = 'Express Shipping';
                }
                
                echo '<br/>';
                echo '<h4><b>'.$sp.'</b></h4>';
            
            ?>
            
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