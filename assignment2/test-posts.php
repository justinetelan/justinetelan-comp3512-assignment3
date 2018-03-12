<?php
    
    function browse(){
    require_once('config.php');
    
    $dbPost = new PostsGateway($connection);
    $dbImg = new ImagesGateway($connection);
    $dbUser = new UsersGateway($connection);
    
    // get the fields you need here
    $postF = $dbPost -> getFields(Array(0, 1, 4));
    $imgF = $dbImg -> getFields(Array(0, 2, 3,6));
    $userF = $dbUser -> getFields(Array(0,1));
    
    $sql = 'SELECT ' . $postF . ', ' . $userF . ', ' . $imgF .
            ' FROM ' . $dbPost->getFrom() .
            ' JOIN ' . $dbUser->getFrom() .
            ' ON ' . $dbUser->getFrom() . '.' .$dbUser->getPk() .
            ' = ' . $dbPost->getFrom() . '.' .$dbPost->getPk() .
            ' JOIN ' . $dbImg->getFrom() .
            ' ON ' . $dbImg->getFrom() . '.' .$dbImg->getPk() .
            ' = ' . $dbPost->getFrom() . '.' .$dbPost->getPk() ;
    
    //echo $sql . '<br>';
    
    $result = $dbPost -> runQuery($sql, null, 0);
    
     foreach($result as $row) {
     echo '<div class="row">
                       <div class="col-md-4">
                         <img src="images/medium/' .$row['Path'].  '" alt="" class="img-responsive"/>
                       </div>';
                      echo' <div class="col-md-8"> 
                          <h2>' . $row['Title'] . '</h2>';
                          echo 'Posted by <a href="single-user.php?id='.$row['UserID'].'">' . $row['FirstName'] .' ' .$row['LastName'] .' </a><br/>';
                            echo '<span class="pull-right"></span>';
                            
                            
                          
                          echo '<p class="excerpt">'.$row['Description'].'</p>
                          <p class="pull-left"><a href="post.php?id=1" class="btn btn-primary btn-sm">Read more</a></p>
                       </div>
                   </div>
                   <hr/>';
     }
    }

?>