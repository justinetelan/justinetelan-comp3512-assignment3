<?php
    
    require_once('config.php');
    include 'functions/functionsClass.php';
    
    $searchImg = $_GET['imgTitle'];
    
    // echo isset($searchImg) . ' ' . $searchImg;
    
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 2 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
          
          <!-- FONTS = Main: Tangerine, Text: Forum -->
          
        <!--<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>-->
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>-->
        
        <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Forum' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        <link rel="stylesheet" href="css/captions.css" />
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />    -->
        <link rel="stylesheet" href="css/bootstrap-new.css" />
        
        <link rel="stylesheet" href="css/index.css" />   
    
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
       <!--<section>-->
          
                <div class="row">
                  
                  <div class="col-md-6">
                      
                      <div>
                          <a href="browse-countries.php"><img src="images/misc/new_countries.jpg" class="img-circle" alt="View Countries" title="View Countries" /></a>
                          <div class="desc">
                              <h4>See all countries with images.</h4>
                          <!--</div>-->
                          <!--<hr>-->
                          <!--<div class="desc">-->
                              <!--<a href="browse-countries.php">View Countries</a>-->
                          </div>
                     </div>
                      
                      
                  </div>
                  
                  <div class="col-md-6">
                      
                      <div>
                          <a href="browse-images.php"><img src="images/misc/new_images.jpg" class="img-circle" alt="View Images" title="View Images" /></a>
                       
                          <div class="desc">
                              <h4>See all of our travel images.</h4>
                          <!--</div>-->
                          <!--<hr>-->
                          <!--<div class="desc">-->
                              <!--<a href="browse-images.php">View Images</a>-->
                          </div>
                      </div>
                      
                      
                  </div>
                
                </div> <!-- close first row -->
                  
                <div class="row">
            
                  <div class="col-md-6">
                      
                      <div>
                          <a href="browse-users.php"><img src="images/misc/new_users.jpg" class="img-circle" alt="View Users" title="View Users" /></a>
                          
                          <div class="desc">
                              <h4>See information about all users.</h4>
                          <!--</div>-->
                          <!--<hr>-->
                          <!--<div class="desc">-->
                              <!--<a href="browse-users.php">View Users</a>-->
                          </div>
                      </div>
                      
                      
                  </div>
                  
                  <div class="col-md-6">
                      
                      <div>
                          <a href="browse-posts.php"><img src="images/misc/new_posts.jpg" class="img-circle" alt="View Posts" title="View Posts" /></a>
                          
                          <div class="desc">
                              <h4>See posts submitted by our users.</h4>
                          <!--</div>-->
                          <!--<hr>-->
                          <!--<div class="desc">-->
                              <!--<a href="browse-posts.php">View Posts</a>-->
                          </div>
                      </div>
                      
                  </div>
                  
                  
              </div> <!-- close second row -->
         
        </div>
           
       <!--</section>-->
        
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