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
            $length = $_GET['total'];
            // echo "DATA: ". $_GET['qty'. $length];
            
            for($i = 0; $i < $length; $i++){
                echo 'ITEM'. $i. "  &nbsp&nbsp    ";
                if($_GET['size'. $i] == 0){
                    echo '5x7   &nbsp&nbsp   ';
                }elseif ($_GET['size'. $i] == 1) {
                    echo '8x10   &nbsp&nbsp   ';
                }elseif ($_GET['size'. $i] == 2) {
                    echo '11x14   &nbsp&nbsp  ';
                }elseif ($_GET['size'. $i] == 3) {
                    echo '12x18   &nbsp&nbsp   ';
                }
                
                
                if($_GET['paper'. $i] == 0){
                    echo '      Matte  &nbsp&nbsp     ';
                }elseif ($_GET['paper'. $i] == 1) {
                    echo '      Glossy   &nbsp&nbsp   ';
                }elseif ($_GET['paper'. $i] == 2) {
                    echo '      Canvas   &nbsp&nbsp   ';
                }
                
                
                if($_GET['frame'. $i] == 0){
                    echo '      None  &nbsp&nbsp     ';
                }elseif ($_GET['frame'. $i] == 1) {
                    echo '      Blonde Maple   &nbsp&nbsp   ';
                }elseif ($_GET['frame'. $i] == 2) {
                    echo '      Expresso Walnut   &nbsp&nbsp   ';
                }elseif ($_GET['frame'. $i] == 3) {
                    echo '      Silver Metal   &nbsp&nbsp   ';
                }elseif ($_GET['frame'. $i] == 4) {
                    echo '      Gold Accent   &nbsp&nbsp   ';
                }
                
                echo 'Quantity:&nbsp&nbsp'. $_GET['qty'. $i];
                
                echo '<br/>';
                
                
            }
                if($_GET['ship'] == 0){
                    echo '      Standard Shipping &nbsp&nbsp     ';
                }elseif ($_GET['ship'] == 1) {
                    echo '      Express  Shipping &nbsp&nbsp   ';
                }
                
                echo '<br/>';
            
            
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