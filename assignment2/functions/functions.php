<?php



    
    // browse-countries.php
    function browseCountries($pdo) {
        
        $countrySql = 'SELECT CountryName, ISO FROM Countries JOIN ImageDetails
                WHERE Countries.ISO = ImageDetails.CountryCodeISO GROUP BY ISO ORDER BY CountryName';
        $statement = $pdo -> prepare($countrySql);
        $statement -> execute();
        
                
        echo '<div class="row" style="padding:1.5em;">';
        
        while($countries = $statement -> fetch()) {
            
            echo '<div class="col-md-3">';
            
            echo '<a href="single-country.php?id=' . $countries['ISO'] . '" value="' . $countries['ISO'] .'">' . $countries['CountryName'] . '</a>';
            
            echo '</div>';
            
        }
        
        echo '</div>';
        
        $pdo = null; // close connection
        
    }
    
    // browse-users.php
    function browseUsers($pdo) {
        
        $usersSql = "SELECT UserID, FirstName, LastName FROM Users ORDER BY LastName";
        $statement = $pdo -> prepare($usersSql);
        $statement -> execute();
                
        echo '<div class="row" style="padding:1.5em;">';
        
            while($users = $statement -> fetch()) {
                
                echo '<div class="col-md-3">';
                
                echo '<td><a href="single-user.php?id=' . $users['UserID'] . '" value="' . $users['UserID'] .'">' 
                        . $users['FirstName'] . " " . $users['LastName'] . '</a></td>';
                
                echo '</div>';
                
            }
            
        echo '</div>';
        
        $pdo = null; // close connection
        
    }
    
    // single-country.php CHANGE INTO Gateways***
    function singleCountry($pdo) { 
        
        $statement = $pdo -> prepare('SELECT CountryName, Capital, Area, Population, CurrencyName, CountryDescription FROM Countries WHERE ISO =?');
        $statement -> bindValue(1, $_GET['id']);
        $statement -> execute();
        $countries = $statement -> fetch();
        
        echo '<h3>' . $countries['CountryName'] . '</h3>';
        echo '<p>Capital: <span class="bold">' . $countries['Capital'] . '</span></p>';
        echo '<p>Area: <span class="bold">' . number_format($countries['Area']) . '</span> sq km.</p>';    
        echo '<p>Population: <span class="bold">' . number_format($countries['Population']) . '</span></p>';
        echo '<p>Currency Name: <span class="bold">' . $countries['CurrencyName'] . '</span></p>';
        echo '<p>' . $countries['CountryDescription'] . '</p>';
            
        $pdo = null; // close connection
        
    }
    
    // single-user.php
    function singleUser($pdo) {
        
        $statement = $pdo -> prepare('SELECT FirstName, LastName, Address, City, Postal, Country, Phone, Email FROM Users WHERE UserID =?');
        $statement -> bindValue(1, $_GET['id']);
        $statement -> execute();
        $users = $statement -> fetch();
        
        echo "<h3>" . $users['FirstName'] . " " . $users['LastName'] . "</h3>";
        echo "<p>" . $users['Address'] . "</p>";
        echo "<p>" . $users['City'] . ", " . $users['Postal'] . ", " . $users['Country'] . "</p>";
        echo "<p>" . $users['Phone'] . "</p>";
        echo "<p>" . $users['Email'] . "</p>";
        
        $pdo = null; // close connection
    }
    
    // displays proper image header for single pages CHANGE INTO Gateways***
    function singleHeaderF($pdo, $type) {
        
        echo '<div class="panel panel-info">';
        
        if($type == "countries") {
            
            $headSql = "SELECT CountryName FROM Countries WHERE ISO = :country";
            $statement = $pdo -> prepare($headSql);
            $statement -> bindValue(':country', $_GET['id']);
            $statement -> execute();
            $singC = $statement -> fetch();
            echo '<div class="panel-heading">Images from ' . $singC['CountryName'] . '</div>';
            
        } else if($type == "users") {
            $headSql = "SELECT FirstName, LastName FROM Users WHERE UserID = :users";
            $statement = $pdo -> prepare($headSql);
            $statement -> bindValue(':users', $_GET['id']);
            $statement -> execute();
            $singC = $statement -> fetch();            
            echo '<div class="panel-heading">Images by ' . $singC['FirstName'] . " " . $singC['LastName'] . '</div>';
            
        }
        
        identifyType($pdo, $type);
        
    }
    
    // calls another function to show appropriate images via query string for single page CHANGE INTO Gateways
    function identifyTypeF($pdo, $type) {
        
        if($type == "countries") {
            $statement = $pdo -> prepare('SELECT CountryName, ImageID, Title, Path FROM Countries JOIN ImageDetails
                                        WHERE Countries.ISO = ImageDetails.CountryCodeISO AND Countries.ISO =?');
                                        
        } else if($type == "users") {
            $statement = $pdo -> prepare('SELECT Users.UserID, FirstName, LastName, Path, ImageID FROM Users JOIN ImageDetails
                                        WHERE Users.UserID = ImageDetails.UserID AND Users.UserID =?');
                                        
        }
        
        $statement -> bindValue(1, $_GET['id']);
        $statement -> execute();
        
        
        showImg($statement, "singles");
        
        echo '</div>'; // close panel-info
        
        $pdo = null; // close connection
        
    }
    
    function singleImage($pdo) {
        
        
        $mainImg = "SELECT Path, Description, Title FROM ImageDetails WHERE ImageID=?";
        $statement = $pdo -> prepare($mainImg);
        $statement -> bindValue(1, $_GET['id']);
        $statement -> execute();
        $image = $statement -> fetch();
        
        echo "<div class='col-md-8'>";
        echo "<img class='img-responsive' ";
        
        echo "src='images/medium/" . $image['Path'] . "' alt='" . $image['Title'] . "'>";
        echo "<p class='description'>" . $image['Description'] . "</p>";
    
        echo "</div>"; // close col-md-8
                
        $sideInfo = "SELECT Title, FirstName, LastName, CountryName, AsciiName, Users.UserID, ISO FROM ImageDetails, Users, Countries, Cities
                    WHERE ImageDetails.UserID = Users.UserID AND ImageDetails.CountryCodeISO = Countries.ISO 
                    AND ImageDetails.CityCode = Cities.CityCode AND ImageID =?";
        $statement = $pdo -> prepare($sideInfo);
        $statement -> bindValue(1, $_GET['id']);
        $statement -> execute();
        $info = $statement -> fetch();
        
        echo "<div class='col-md-4'>";
        
        echo "<h2>" . $info['Title'] . "</h2>";
        
        echo "<div class='panel panel-default'>";
            echo "<div class='panel-body'>";
                echo "<ul class='details-list'>";
                    echo "<li>By: <a href='single-user.php?id=" . $info['UserID'] . "'>" . $info['FirstName'] . " " . $info['LastName'] . "</a></li>";
                    echo "<li>Country: <a href='single-country.php?id=" . $info['ISO'] . "'>" . $info['CountryName'] . "</a></li>";
                    echo "<li>City: " . $info['AsciiName'] . "</li>";
                echo "</ul>";
            echo "</div>";
        echo "</div>";
        
        $pdo = null; // close connection
        
    }
    
    function dropdown($pdo, $type) {
    
        if($type == "continent") {
          
          $continentSql = 'SELECT ContinentCode, ContinentName FROM Continents ORDER BY ContinentName';
          $statement = $pdo -> prepare($continentSql);
          $statement -> execute();
          
          while ($conti = $statement -> fetch()) {     
            echo '<option value="' . $conti['ContinentCode'] . '">' . $conti['ContinentName'] . '</option>';
          }
          
        } else if($type == "country") {
          
          $countrySql = 'SELECT CountryName, ISO FROM Countries JOIN ImageDetails
                          WHERE Countries.ISO = ImageDetails.CountryCodeISO GROUP BY ISO';
          $statement = $pdo -> prepare($countrySql);
          $statement -> execute();
          
          
          while($countries = $statement -> fetch()) {
              echo '<option value="' . $countries['ISO'] . '">' . $countries['CountryName'] . '</option>'; 
          }
          
        } else if($type == "city") {
          
          $citySql = 'SELECT AsciiName, Cities.CityCode FROM Cities JOIN ImageDetails
                          WHERE Cities.CityCode = ImageDetails.CityCode GROUP BY AsciiName ORDER BY AsciiName';
          $statement = $pdo -> prepare($citySql);
          $statement -> execute();
          
          while($city = $statement -> fetch()) {
              echo '<option value="' . $city['CityCode'] . '">' . $city['AsciiName'] . '</option>'; 
          }
          
        }
        
        $pdo = null; // close connection
    
    }
    
    // displays the appropriate header for browse-images
    function filterHeader($pdo) {
        
        echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">Images ';
            
            if((!isset($_GET['continent']) && !isset($_GET['country']) && !isset($_GET['city'])) || ($_GET['country'] == "0" && $_GET['continent'] == "0" && $_GET['city'] == "0" && $_GET['title'] == "")) {
                
                echo "[All]";
                
            } else if(isset($_GET['continent']) && $_GET['continent'] != "0") {
                
                echo "[Continent=" . $_GET['continent'] . "]";
                
            } else if(isset($_GET['country']) && $_GET['country'] != "0") {
                
                echo "[Country=" . $_GET['country'] . "]";
            
            } else if(isset($_GET['city']) && $_GET['city'] != "0") {
                
                echo "[City=" . $_GET['city'] . "]";
                
            } else if(isset($_GET['title']) && $_GET['title'] != "0") {
                
                echo "[Title=" . $_GET['title'] . "]";
            }
            
            echo '</div>';
            
                echo '<div class="panel-body">';
                
                    filterImg($pdo); // calls to retrieve what has been filtered
                    
                echo '</div>';
            
        echo '</div>'; // close panel-default
        
    }    
    
    function filterImg($pdo) {
        
        if($_SERVER["REQUEST_METHOD"] == "GET") {
          
             $startSql = 'SELECT ImageID, Title, Path FROM ';
             $sql = "";
             
             
             if((!isset($_GET['continent']) && !isset($_GET['country']) && !isset($_GET['city'])) || ($_GET['country'] == "0" && $_GET['continent'] == "0" && $_GET['city'] == "0" && $_GET['title'] == "")) {
               
                $sql = $startSql . 'ImageDetails';
                $statement = $pdo -> prepare($sql);
               
             } else if(isset($_GET['continent']) && $_GET['continent'] != "0") {
               
                $sql = $startSql . 'Continents JOIN ImageDetails USING(ContinentCode) WHERE Continents.ContinentCode = :continent';
                $statement = $pdo -> prepare($sql);
                $statement -> bindValue(':continent', $_GET['continent']);
             
            } else if(isset($_GET['country']) && $_GET['country'] != "0") {
                
                $sql = $startSql . 'Countries JOIN ImageDetails WHERE Countries.ISO = ImageDetails.CountryCodeISO AND Countries.ISO = :country';
                $statement = $pdo -> prepare($sql);
                $statement -> bindValue(':country', $_GET['country']);
              
            } else if(isset($_GET['city']) && $_GET['city'] != "0") {
                
                $sql = $startSql . 'Cities JOIN ImageDetails USING(CityCode) WHERE Cities.CityCode = :city';
                $statement = $pdo -> prepare($sql);
                $statement -> bindValue(':city', $_GET['city']); 
                
            } else if(isset($_GET['title']) && $_GET['title'] != "") {
              
                $search = $_GET['title'];
                $sql = $startSql . 'ImageDetails WHERE Title LIKE :title';
                $statement = $pdo -> prepare($sql);
                $search = "%" . $search . "%";
                $statement -> bindParam(':title', $search);
              
            }
             
            $statement -> execute(); 
            
            showImg($statement, "filtering"); // calls the appropriate filtered images
         
        }      
        
    }
    
    // displays the images for the single pages and browse-images CHANGE INTO Gateways*****
    /*function showImg($statement, $page) {
        
        while($img = $statement -> fetch()) {
        
            if($page == "singles") {
            
                echo '<div class="smallImg" onmouseover="popOut('.$img['ImageID'].')" onmouseout="popIn('.$img['ImageID'].')">';
                
                    echo '<a href="single-image.php?id=' . $img['ImageID'] . '"><img src="images/square-small/' . $img['Path'] . '"></a>';
                
                echo '</div>'; // close images div
                
                
                echo '<div class="cls">
                <div id='.$img['ImageID'].' >';// popover small image
                    echo '<h6 >'.$img['Title'].'</h6>';
                    echo '<img src="images/square-small/' . $img['Path'] . '">';
                
                echo '
                </div>
                </div>'; 
                
                ?>
                <script>
                    function popIn(x){
                        document.getElementById(x).style.visibility="hidden";
                    }
                    function popOut(x){
                        document.getElementById(x).style.visibility="visible";
                    }
                </script>
            
             <?php   
            } else if($page == "filtering") {
                
                echo '<li>';
                echo '<a href="single-image.php?id=' . $img['ImageID'] . '"><img src="images/square-medium/' . $img['Path'] . '">';
                echo '<div class="caption">';
                    echo '<div class="blur"></div>';
                        echo '<div class="caption-text">';
                            echo '<p>' . $img['Title'] . '</p>';
                        echo '</div>'; // close caption-text
                echo '</div></a>'; // close caption
                echo '</li>';
                
            }
            
        }
        
        $pdo = null; // close connection
        
    }*/
    
?>