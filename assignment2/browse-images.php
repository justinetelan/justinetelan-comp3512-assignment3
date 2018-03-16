<?php 

    require_once('config.php'); 
    try {
      $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
    catch (PDOException $e) {
      die( $e->getMessage() );
    }
    
   // include 'functions/functions.php';
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
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
    
    </head>
    
    <body>
        
        <header>
            <?php include 'includes/header.inc.php'; ?>
        </header>
        
        
        <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          
          <div class="panel-body">
            <form action="browse-images.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control" onchange="this.form.submit()">
                <option value="0">Select Continent</option>
                
                /* display list of continents */
                <?php 
                  // dropdownF($pdo, "continent"); 
                  dropdown($connection, "continent");
                ?>
                
              </select>     
              
              <select name="country" class="form-control" onchange="this.form.submit()">
                <option value="0">Select Country</option>
                
                /* display list of countries */
                <?php 
                  
                  // dropdown($pdo, "country"); 
                  dropdown($connection, "country");
                  
                ?>
                
              </select>    
              
              <select name="city" class="form-control" onchange="this.form.submit()">
                <option value="0">Select City</option>
                
                /* display list of cities */ 
                <?php 
                
                  dropdown($connection, "city"); 
                
                ?>
                
              </select>    
              
              
              <button type="submit" value="Reset" class="btn btn-success">Clear</button>
              </div>
            </form>
            <script>
              
              function showMenu() {
                document.getElementById("continent").classList.toggle("show");
              }
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