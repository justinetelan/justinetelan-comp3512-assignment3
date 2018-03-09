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


// USERSGATEWAY TEST
$db = new UsersGateway($connection);
$result = $db -> getById(1);
echo '<h3>Sample Post (id=1)</h3>';
echo $result['UserID'] . ' ' . $result['FirstName'] . ' ' . $result['LastName'];
        
$result = $db -> getAll();
echo '<h3>UsersGateway</h3>';
foreach($result as $row) {
    echo '<br>'. $row['UserID'] . ' ' . $row['FirstName'] . ' ' . $row['LastName'] . '<br>';
}

echo '<hr>';


// USERSGATEWAY TEST
$db = new CountriesGateway($connection);
$result = $db -> getById("AL");
echo '<h3>Sample Post (id=AL)</h3>';
echo $result['ISO'] . ' ' . $result['CountryName'] . ' ' . $result['Capital'];
        
$result = $db -> getAll();
echo '<h3>CountriesGateway</h3>';
foreach($result as $row) {
    echo '<br>'. $row['ISO'] . ' ' . $row['CountryName'] . ' ' . $row['Capital'] . '<br>';
}

echo '<hr>';

?>
</body>
</html>