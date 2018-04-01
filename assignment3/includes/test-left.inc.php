<?php

function left(){
require_once('config.php');
$dbContinent = new ContinentsGateway($connection);
$continentF = $dbContinent->getFields(Array(1,2));

$sql = 'SELECT ' . $continentF .
            ' FROM ' . $dbContinent->getFrom();

$result = $dbContinent -> runQuery($sql, null, 0);


?>



            
            <?php 
            
            echo "<aside class='col-md-2'>
            <div class='panel panel-info'>
            <div class='panel-heading'>Continents</div>
            <ul class='list-group'>";
            foreach($result as $row) {
                
                    echo "<li class='list-group-item'><a href='browse-images.php?continent=" . $row['ContinentCode'] . "'>" . $row['ContinentName'] . "</a></li>";
                
            }
             echo "</ul>
            </div>
            <!-- end continents panel -->
            <!-- end continents panel -->
            </aside>";
}
            ?>
            
        
