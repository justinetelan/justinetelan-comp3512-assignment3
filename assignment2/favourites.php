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
        <title>Assignment 2 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    
        <link rel="stylesheet" href="css/captions.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/general.css" /> 
        
    
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
        <?php
        if(isset($_SESSION['faveP'])){
        echo' <div class="alert alert-success" id="favePost" role="alert" style="visibility:hidden">';
             echo'   POST ADDED TO FAVOURITES';
             echo' </div>';
             unset($_SESSION['faveP']);
        
        }
        if(isset($_SESSION['faveI'])){
        echo' <div class="alert alert-warning" id="favePost" role="alert" style="visibility:hidden">';
             echo'   IMAGE ADDED TO FAVOURITES';
             echo' </div>';
             unset($_SESSION['faveI']);
        
        }
        ?>
        <div class="container">
            
            <?php viewFaves(); ?>
            
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