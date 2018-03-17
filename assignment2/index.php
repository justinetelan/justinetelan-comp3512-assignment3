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
          
          <!-- FONTS = Main: Actor, Text: Advent Pro -->
          
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
        
    
        <link rel="stylesheet" href="css/captions.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
        
        <link rel="stylesheet" href="css/index.css" />   
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
       <section>
          <div class="card">
              <figure>
                  <a href="browse-countries.php"><img src="images/misc/home_countries.jpg" alt="View Countries" title="Countries" /></a>
              </figure>
              <div class="desc">
                  <h3>Countries</h3>
                  <p>See all countries for which we have images.</p>
              </div>
              <hr>
              <div class="desc">
                  <a href="browse-countries.php">View Countries</a>
              </div>
          </div>
          
          <div class="card">
              <figure>
                  <a href="browse-images.php"><img src="images/misc/home_images.jpg" alt="View Images" title="Images" /></a>
              </figure>
              <div class="desc">
                  <h3>Images</h3>
                  <p>See all of our travel images.</p>
              </div>
              <hr>
              <div class="desc">
                  <a href="browse-images.php">View Images</a>
              </div>
          </div>
          
          <div class="card">
              <figure>
                  <a href="browse-users.php"><img src="images/misc/home_users.jpg" alt="View Users" title="Users" /></a>
              </figure>
              <div class="desc">
                  <h3>Users</h3>
                  <p>See information about our contributing users.</p>
              </div>
              <hr>
              <div class="desc">
                  <a href="browse-users.php">View Users</a>
              </div>
          </div>
          
          <div class="card">
              <figure>
                  <a href="browse-posts.php"><img src="images/misc/home_countries.jpg" alt="View Users" title="Users" /></a>
              </figure>
              <div class="desc">
                  <h3>Posts</h3>
                  <p>See posts submitted by our users.</p>
              </div>
              <hr>
              <div class="desc">
                  <a href="browse-posts.php">View Posts</a>
              </div>
          </div>
         
    
           
       </section>
        
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