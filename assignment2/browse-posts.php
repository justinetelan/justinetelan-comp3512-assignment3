<?php
    require_once('config.php');
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
    <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>

<body>
    <header>
       <?php  include 'includes/header.inc.php'; ?>
    </header>


    <!-- Page Content -->
    <main class="container">
        <div class="row">
            
             <?php include 'includes/left.inc.php'; ?>
            
            <div class="col-md-10">

                <div class="jumbotron" id="postJumbo">
                    <h1>Posts</h1>
                    <p>Read other travellers' posts ... or create your own.</p>
                    <p><a class="btn btn-warning btn-lg">Learn more &raquo;</a></p>
                </div>        
      
                 <!-- start post summaries -->
                 <div class="postlist">
                 <?php
                 
                //  include 'test-posts.php';
                    browsePosts($connection);
                 
                 ?>
                 </div>
                 </div>   <!-- end postlist -->         
                            
            </div>  <!-- end col-md-10 -->
        </div>   <!-- end row -->
        
    </main>
            


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>