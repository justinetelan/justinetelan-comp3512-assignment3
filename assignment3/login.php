<?php
//This is the login page for the website
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
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <link rel="stylesheet" href="css/login.css"/>
        <link rel="stylesheet" href="css/general.css"/>
    
    </head>
    
    <body>
        
        <header>
            <?php 
            // Changes login to logout button depending on whether user is logged in or not
            if(isset($_SESSION['user'])){
                include 'includes/headerLogout.inc.php'; 
                
            }else if (!isset($_SESSION['user'])){
                include 'includes/header.inc.php'; 
            }
            
            ?>
        </header>
        <main class="container">
            <form action="session.php" method="post">
  

  <div class="jumbotron">
      <?php
      //Displays invalid user/pass message if user types in wrong pass or username
      if(isset($_SESSION['error'])){
        echo' <div class="alert alert-danger" id="error" role="alert" style="visibility:visible">';
             echo'  INVALID PASSWORD/USERNAME TRY AGAIN';
             echo' </div>';
             unset($_SESSION['error']);
        
        }
      
      ?>
      
      <script>
      function err(){
        var a = document.getElementById("error");
        a.style="visibility: hidden";
      }
        
        </script>
      
      
      <div class="row">
      
    <h2>Please log in.</h2>
    <label for="uname"><b>Username</b></label>
    <input type="text" onkeydown="err()" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" onkeydown="err()" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit">Login</button>
    <div><img src="images/design/login.jpg"></div>
    
  </div>

  
  </div>
</form>
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