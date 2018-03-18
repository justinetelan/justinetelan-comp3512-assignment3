<?php

    // $post = $_GET['id'];
    
    // if(!isset($post) || empty($post)) {
    //     header('Location: error.php');
    // }
    
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
        <link rel="stylesheet" href="css/bootstrap-theme.css" />    
        
    
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
                        
                        <?php 
                        
                            singlePost($connection);
                        
        //                  $dbPost = new PostsGateway($connection);
        //                  $dbImg = new ImagesGateway($connection);
        //                  $dbUser = new UsersGateway($connection);
        
        // // get UserID from Posts instead OR Users
        //                 $postF = $dbPost -> getFields(Array(2, 3, 4, 5)); // MainPostImage, Title, Message, PostTime
        //                 $imgF = $dbImg -> getFields(Array(0, 6)); // UserID, Path
        //                 $userF = $dbUser -> getFields(Array(0, 1, 10)); // FirstName, LastName
        
        //                 $sql = 'SELECT ' . $postF . ', ' . $imgF . ', ' . $userF .
        //         ' FROM ' . $dbPost -> getFrom() . ', ' . $dbImg -> getFrom() . ', ' . $dbUser -> getFrom() .
        //         ' WHERE ' . $dbPost -> getFrom() . '.' . $dbPost -> getFields(Array(2)) . ' = ' . $dbImg -> getFrom() . '.' . $dbImg -> getPk() .
        //         ' AND ' . $dbPost -> getFields(Array(1)) . ' = ' . $dbUser -> getFrom() . '.' . $dbUser -> getPk() .
        //         ' AND ';
        
        // $result = $dbPost -> getById($sql, $_GET['id'], 0);
        
        
                        
                        
                        
                        
        //                     $faveArry = array();
        //                     singlePost($connection); 
        //                     addFavePost($connection, $faveArry);
                        
                        ?>
                        
                        <div class='btn-group btn-group-justified' role='group' aria-label='...'>
                            <div class='btn-group' role='group'>
                                <?php addFavePost($connection, "singlePost"); ?><!--<button type='button' class='btn btn-default'><span class='glyphicon glyphicon-heart' aria-hidden='true'></span></button>-->
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-save' aria-hidden='true'></span></button>
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></button>
                            </div>
                            
                            <div class='btn-group' role='group'>
                                <button type='button' class='btn btn-default'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
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