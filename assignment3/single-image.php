<?php
//Single image page
    $img = $_GET['id'];
    
    if(!isset($img) || empty($img)) {
        header('Location: error.php');
    }
    
    session_start();
    require_once('config.php');
    include 'functions/functionsClass.php';
    
    $dbImg = new ImagesGateway($connection);
    $sql = 'SELECT ' . $dbImg -> getPk() . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
    $checkImg = $dbImg -> getById($sql, $img, 0);
    if($checkImg == null) {
        header('Location: error.php');
    }
    
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
        <!--<link rel="stylesheet" href="css/bootstrap-theme.css" />-->
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/theme.css" />
        <script src="js/jquery-3.3.1.js"></script>
    
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
            <div class="row">
                
                <?php include 'includes/left.inc.php'; ?>
                
                <div class="col-md-10">
                    <div class="row">
                        
                        <?php singleImg($connection); ?>
                        
                        <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                            <div class='btn-group' role='group'>
                                <?php addFavePost($connection, "singleImg"); ?>
                                
                                    <p id="existIm">Image already exists in favourites list.</p>
                                    <script>$('#existIm').hide();</script>
                                    
                                    <?php
                                    
                                    $dbImg = new ImagesGateway($connection);
                                	$imgF = $dbImg -> getFields(Array(0, 1, 2, 6)); // ImageID, UserID, Title, Path
                                	
                                	$sql = 'SELECT ' . $imgF . ' FROM ' . $dbImg -> getFrom() . ' WHERE ';
                                	
                                	$result = $dbImg -> getById($sql, $_GET['id'], 0);
                                    if(isset($_SESSION['user'])) {
                                		if(count($_SESSION['faveImg']) != 0) { // if there are already image favourites
                                		
                                			foreach($_SESSION['faveImg'] as $currFaveImg) {
                                			
                                				if($currFaveImg['ImageID'] == $result['ImageID']) { // show message
                                					echo '<script src="js/img-exist.js"></script>';
                                				}
                                			}
                                		}
                                	}
                                	?>
                                	
                            </div>
                        </div> <!-- close button class -->
                        
                        <?php mapp($connection, "image"); ?>
                        
                        </div> <!-- close div col-md-4 within singleImage() -->                  
                            
                    </div>
                    
                </div>
                
            </div>
            
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