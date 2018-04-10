<?php 

    require_once('config.php'); 
    
    //This page allows for user to browse through image pages
    session_start();
    
    include 'functions/functionsClass.php';
    
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
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <script src="js/jquery-3.3.1.js"></script>
        
        <!--<script>alert('fuck');</script>-->
    
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
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          
          <div class="panel-body">
            <form action="browse-images.php" method="get" class="form-horizontal" id="formFilter">
              <div class="form-inline">
              <select name="continent" class="form-control" id="contin">
                <option value="0">Select Continent</option>
                
                <?php dropdown($connection, "continent"); ?>
                
              </select>     
              
              <select name="country" class="form-control"> 
                <option value="0">Select Country</option>
                
                <?php dropdown($connection, "country"); ?>
                
              </select>    
              
              <select name="city" class="form-control"> 
                <option value="0">Select City</option>
                
                <?php dropdown($connection, "city"); ?>
                
              </select>    
              
              
              <button type="submit" value="Reset" class="btn btn-success">Clear</button>
              <!-- handles auto-submit -->
              <script>
                
                $(function() {
                    $("select").change(function(){
                        $('form').submit();
                    });
                });
                
              </script>
              </div>
            </form>
            <script>
              
            //   function showMenu() {
            //     document.getElementById("continent").classList.toggle("show");
            //   }
            </script>
            
            

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
		    
		     <?php filterHeader($connection); ?> 
	    	  
        </ul>   
        
        
    
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