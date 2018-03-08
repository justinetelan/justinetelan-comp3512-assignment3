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
            
                $contiSql = "SELECT ContinentName, ContinentCode FROM Continents";
                $statement = $pdo -> prepare($contiSql);
                $statement -> execute();
                
                while($continents = $statement -> fetch()) {
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
                
                
                $countrySql = 'SELECT CountryName, ISO FROM Countries JOIN ImageDetails
                      WHERE Countries.ISO = ImageDetails.CountryCodeISO GROUP BY ISO ORDER BY CountryName';
                $statement = $pdo -> prepare($countrySql);
                $statement -> execute();
                
                
                while($countries = $statement -> fetch()) {
					
					echo "<li class='list-group-item'>";
					echo "<a href='browse-images.php?country=" . $countries['ISO'] . "'>" . $countries['CountryName'] . "</a>";
					echo "</li>";
                }
            ?>
        </ul>
    </div>
    <!-- end continents panel -->
</aside>