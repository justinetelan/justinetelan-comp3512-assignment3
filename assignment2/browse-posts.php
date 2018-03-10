<?php


 
include 'config.php';
$db = new PostsGateway($connection );
$result = $db -> getAll();
foreach($result as $row) {
    
    echo '<div class="row">
                       
                       <div class="col-md-4"></div>';
                      echo' <div class="col-md-8"> 
                          <h2>'. $row['Title'].'</h2>';
                          echo 'Posted by <a href=> '.$row2['FirstName'].' ' .$row2['LastName'].'</a><br/>';
                            echo '<span class="pull-right">'.$row['PostTime'].'</span>';
                            
                          
                          echo '<p class="excerpt">'.substr($row['Message'], 0, 170). '
                            
                          </p>
                          <p class="pull-left"><a href="single-post.php?id=' .$row['MainPostImage']. '" class="btn btn-primary btn-sm">Read more</a></p>
                       </div>
                   </div>
                   <hr/>'; 

}
?>