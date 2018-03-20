<?php

    require_once('config.php'); 
    try {
      $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    }
    catch (PDOException $e) {
      die( $e->getMessage() );
    }
    
    // include 'functions/functions.php'; 

?>

<aside class="col-md-2">
    <div class="panel panel-info">
        <div class="panel-heading">Continents</div>
        <ul class="list-group">
            
            <?php 
            
                $dbCont = new ContinentsGateway($connection);
                $contF = $dbCont -> getFields(Array(0, 1)); // ContinentCode, ContinentName
            
                $contiSql = 'SELECT ' . $contF . ' FROM Continents';
                $result = $dbCont -> runQuery($contiSql, null, 0);
                
                foreach($result as $continents) {
                    echo "<li class='list-group-item'><a href='browse-images.php?continent=" . $continents['ContinentCode'] . "'>" . $continents['ContinentName'] . "</a></li>";
                }

            ?>
            
        </ul>
    </div>
    <!-- end continents panel -->

    <div class="panel panel-info">
        <div class="panel-heading">Popular</div>
        <ul class="list-group">
           <?php      
                
                $dbCount = new CountriesGateway($connection);
                $dbImg = new ImagesGateway($connection);
                $countF = $dbCount -> getFields(Array(0, 2)); // Countries.ISO, CountryName
                
            
                $sqlCount = 'SELECT ' . $countF . ' FROM ' . $dbCount -> getFrom() .
                            ' JOIN ' . $dbImg -> getFrom() .
                            ' WHERE ' . $dbCount -> getFields(Array(0)) . ' = ' . $dbImg -> getFields(Array(5));
                $result = $dbCount -> findAllSorted($sqlCount, "groupBy"); // GROUP BY ISO
                
                foreach($result as $countries) {
                    echo '<li class="list-group-item">';
                    echo "<a href='browse-images.php?country=" . $countries['ISO'] . "'>" . $countries['CountryName'] . "</a>";
                    echo '</li>';
                }
                
            ?>
        </ul>
    </div>
    <!-- end continents panel -->
</aside>