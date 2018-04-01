<?php
//Single post page
    $post = $_GET['id'];
    
    if(!isset($post) || empty($post)) {
        header('Location: error.php');
    }
    
    require_once('config.php');
    session_start();
    
    $dbPost = new PostsGateway($connection);
    $sql = 'SELECT ' . $dbPost -> getPk() . ' FROM ' . $dbPost -> getFrom() . ' WHERE ';
    $checkPost = $dbPost -> getById($sql, $post, 0);
    if($checkPost == null) {
        header('Location: error.php');
    }
    include 'functions/functionsClass.php';
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <title>Assignment 2 (Winter 2018)</title>
    
          <meta name="viewport" content="width=device-width, initial-scale=1">
        
    
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        
    
        <link rel="stylesheet" href="css/captions.css" />
        
        <link rel="stylesheet" href="css/format.css" />
        <link rel="stylesheet" href="css/information.css" />  
        <link rel="stylesheet" href="css/theme.css" />
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
        
        <main class="container">
            <div class="row">
                
                <?php include 'includes/left.inc.php'; ?>
                
                <div class="col-md-10">
                    <div class="row">
                        
                        <?php singlePost($connection); ?>
                        
                        <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                            <div class='btn-group' role='group'>
                                <?php addFavePost($connection, "singlePost"); ?><!--<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span></button>-->
                            </div>
                        </div> <!-- close button class 
                        
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