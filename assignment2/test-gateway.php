<?php

require_once('config.php');

?>

<html>
<body>

<?php
// IMAGESGATEWAY TEST
$db = new ImagesGateway($connection);
$result = $db -> getById(74);
echo '<h3>Sample Image (id=74)</h3>';
echo $result['ImageID'] . ' ' . $result['Title'] . ' ' . $result['Path'];
        
$result = $db -> getAll();
echo '<h3>ImagesGateway</h3>';

foreach($result as $row) {
    
    echo $row['ImageID'] . ' ' . $row['Title'] . ' ' . $row['Path'] . '<br>';
}

echo '<hr>';

// POSTSGATEWAY TEST
$db = new PostsGateway($connection);
$result = $db -> getById(12);
echo '<h3>Sample Post (id=12)</h3>';
echo $result['PostID'] . ' ' . $result['Message'] . ' ' . $result['PostTime'];
        
$result = $db -> getAll();
echo '<h3>PostsGateway</h3>';
foreach($result as $row) {
    echo '<br>'. $row['PostID'] . ' ' . $row['Message'] . ' ' . $row['PostTime'] . '<br>';
}

echo '<hr>';

?>
</body>
</html>