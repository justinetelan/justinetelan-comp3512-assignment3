<?php

    require_once('config.php');

    // USERSGATEWAY TEST
    $dbC = new CountriesGateway($connection);
    $dbI = new ImagesGateway($connection);
    
    'SELECT CountryName, ImageID, Title, Path FROM Countries JOIN ImageDetails
        WHERE Countries.ISO = ImageDetails.CountryCodeISO AND Countries.ISO =?';
        
    $fieldC = $dbC -> getFields(Array(2));
    $fieldI = $dbI -> getFields(Array(0, 2, 6));
    
    $sql = 'SELECT ' . $fieldC . ', ' . $fieldI .
            ' FROM ' . $dbC -> getFrom() . ', ' . $dbI -> getFrom() .
            ' WHERE ' . $dbC -> getFields(Array(0)) . ' = ' . $dbI -> getFields(Array(5)) .
            ' AND ' . $dbC -> getFields(Array(0)) . ' = "GR"';
    
    echo $sql . '<br>';
    
    $result = $dbC -> runQuery($sql, null, 0);
    
    foreach ($result as $row) {
                echo '<div class="smallImg">';
        
            echo '<a href="single-image.php?id=' . $row['ImageID'] . '"><img src="images/square-small/' . $row['Path'] . '"></a>';
        
        echo '</div>'; // close images div     
    }
    
    
    // for($result) {// as $row) {
    //     echo '<div class="smallImg">';
        
    //         echo '<a href="single-image.php?id=' . $result['ImageID'] . '"><img src="images/square-small/' . $result['Path'] . '"></a>';
        
    //     echo '</div>'; // close images div        
    // }
    
    // $result = $db -> getById("AL");
    // echo '<h3>Sample Post (id=AL)</h3>';
    // echo $result['ISO'] . ' ' . $result['CountryName'] . ' ' . $result['Capital'];
            
    // $result = $db -> getAll();
    // echo '<h3>CountriesGateway</h3>';
    // foreach($result as $row) {
    //     echo '<br>'. $row['ISO'] . ' ' . $row['CountryName'] . ' ' . $row['Capital'] . '<br>';
    // }
    
    // echo '<hr>';

?>