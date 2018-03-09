<?php
 $db = new PostsGateway($connection);

        
$result = $db -> getAll();
foreach($result as $row) {
    echo '<div class="row">
                       
                       <div class="col-md-4"></div>';
                      echo' <div class="col-md-8"> 
                          <h2></h2>';
                          echo 'Posted by </a><br/>';
                            echo '<span class="pull-right"></span>';
                            echo ' REVIEWS';
                            
                          
                          echo '<p class="excerpt">
                            
                          </p>
                          <p class="pull-left"><a href="post.php?id=1" class="btn btn-primary btn-sm">Read more</a></p>
                       </div>
                   </div>
                   <hr/>'; 
}
?>
