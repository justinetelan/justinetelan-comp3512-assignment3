

<?php
    function browsePosts($connection){
        
        $dbPost = new PostsGateway($connection);
        $dbImg = new ImagesGateway($connection);
        $dbUser = new UsersGateway($connection);
        
        // get the fields you need here
        $postF = $dbPost -> getFields(Array(0,1,3, 4)); // PostID, UserID,Posts.Title, Message
        $imgF = $dbImg -> getFields(Array(0, 3, 6)); // ImageID, Description, Path
        $userF = $dbUser -> getFields(Array(0,1,10)); // FirstName, LastName, UserID
        //$userID = $dbUser -> getPk();
        
        $sql = 'SELECT ' . $postF . ', ' . $userF . ','   .$imgF .
                ' FROM ' . $dbPost->getFrom() .
                ' JOIN ' . $dbUser->getFrom() .
                ' ON ' . $dbUser->getFrom() . '.' .$dbUser->getPk() .
                ' = ' .$dbPost ->getFields(Array(1)) .
                ' JOIN ' . $dbImg->getFrom() .
                ' ON ' . $dbImg->getFrom() . '.' .$dbImg->getPk() .
                ' = ' . $dbPost->getFrom() . '.' .$dbPost -> getFields(Array(2));//$dbPost->getPk() ;
        
        //echo $sql . '<br>';
        
        echo $sql;
        
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
                            <p class="pull-left"><a href="single-post.php?id=' . $row['PostID'] . '" class="btn btn-primary btn-sm">Read more</a></p>
                   </div>
               </div>
               <hr/>';
         }
    }

    function singlePost($connection) { // USED COMMA JOIN
        
        $dbPost = new PostsGateway($connection);
        $dbImg = new ImagesGateway($connection);
        $dbUser = new UsersGateway($connection);
        
        // get UserID from Posts instead OR Users
        $postF = $dbPost -> getFields(Array(2, 3, 4, 5)); // MainPostImage, Title, Message, PostTime
        $imgF = $dbImg -> getFields(Array(0, 6)); // UserID, Path
        $userF = $dbUser -> getFields(Array(0, 1, 10)); // FirstName, LastName
        
        $sql = 'SELECT ' . $postF . ', ' . $imgF . ', ' . $userF .
                ' FROM ' . $dbPost -> getFrom() . ', ' . $dbImg -> getFrom() . ', ' . $dbUser -> getFrom() .
                ' WHERE ' . $dbPost -> getFrom() . '.' . $dbPost -> getFields(Array(2)) . ' = ' . $dbImg -> getFrom() . '.' . $dbImg -> getPk() .
                ' AND ' . $dbPost -> getFields(Array(1)) . ' = ' . $dbUser -> getFrom() . '.' . $dbUser -> getPk() .
                ' AND ';
        
        $result = $dbPost -> getById($sql, $_GET['id'], 0);
        
        // echo $sql;
        
        echo "<div class='col-md-8'>";
        
        echo "<img class='img-responsive' ";
        
        echo "src='images/medium/" . $result['Path'] . "' alt='" . $result['Title'] . "'>";
        echo "<p>" . $result['Message'] . "</p>";
    
        echo "</div>"; // close col-md-8
        
        echo "<div class='col-md-4'>";
        
        echo "<h1>" . $result['Title'] . "</h1>";
        
        echo "<div class='panel panel-default'>";
            echo "<div class='panel-body'>";
                echo "<ul class='details-list'>";
                    echo "<li>By: <a href='single-user.php?id=" . $result['UserID'] . "'>" . $result['FirstName'] . " " . $result['LastName'] . "</a></li>";
                    echo "<li>" . $result['PostTime'] . "</li>";
                echo "</ul>";
            echo "</div>";
        echo "</div>";
        
        relatedImgPost($connection);
        
    }
    
    function singleU() {
        
    }
    
    function relatedImgPost($connection) {
        
        $dbPost = new PostsGateway($connection);
        $dbImg = new ImagesGateway($connection);
        $dbPostImg = new PostImagesGateway($connection);
        
        
        $imgF = $dbImg -> getFields(Array(6)); // Path
        $imgID = $dbPostImg -> getFrom() . '.' . $dbPostImg -> getFields(Array(0));
        $postID = $dbPostImg -> getFrom() . '.' . $dbPostImg -> getFields(Array(1));
        
        
        $sql = 'SELECT ' . $imgF . ', ' . $imgID . ', ' . $postID . //$postF . ', ' . $imgF . ', ' . $postImgF .
                ' FROM ' . $dbImg -> getFrom() . ' JOIN ' . $dbPostImg -> getFrom() .
                ' USING(' . $dbPostImg -> getFields(Array(0)) . ') ' .
                ' WHERE ' . $dbPostImg -> getFrom() . '.';
                
        $result = $dbPost -> getById($sql, $_GET['id'], 1);
        
        foreach($result as $row) {
            
            // LINK IMG TO SINGLE-IMAGE OR NAH
            
            // echo '<div id="smallImg">';
              echo '<img src="images/square-small/' . $row['Path'] . '">';
            // echo '</div>';
            
        }   
        
    }
    
    function countryInfo($connection) {
        $dbCountry = new CountriesGateway($connection);
        
        //CountryName, Capital, Area, Population, CurrencyName, CountryDescription
        $countryF = $dbCountry -> getFields(Array(2, 3, 5, 6, 10, 14));
        
        $sqlInfo = 'SELECT ' . $countryF . ' FROM ' . $dbCountry -> getFrom() . ' WHERE ';
        
        $countryInfo = $dbCountry -> getById($sqlInfo, $_GET['id'], 0);
        
        echo '<hr><p><strong>Country: </strong>' . $countryInfo['CountryName'] . '</p>';
        echo '<p><strong>Capital: </strong>' . $countryInfo['Capital'] . '</p>';
        echo '<p><strong>Area: </strong>' . number_format($countryInfo['Area']) . '</p>';
        echo '<p><strong>Population: </strong>' . number_format($countryInfo['Population']) . '</p>';
        echo '<p><strong>Currency Name: </strong>' . $countryInfo['CurrencyName'] . '</p>';
        echo '<p>' . $countryInfo['CountryDescription'] . '</p>';

    }
    
    function simpleSearch($connection) {
        
        $dbImg = new ImagesGateway($connection);
        
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            
            $sql = 'SELECT ' . $dbImg -> getFields(Array(0, 2, 6)) . // ImageID, Title, Path
                    ' FROM ' . $dbImg -> getFrom(); 
            // $sql = 'SELECT ' . $startSql . ' FROM ';
            
            // header('Location: browse-images.php');
            
            echo $sql;
            
            // if(isset($_GET['imgTitle']) && $_GET['imgTitle'] != "") {
            //     $search = $_GET['imgTitle'];
            //     $sql = $startSql . ' WHERE Title LIKE :title';
            //     $statement = $dbImg -> runQuery($sql, null, 0);
            //     $search = "%" . $search . "%";
            //     $statement -> bindParam(':title', $search);
            //     // header('Location: browse-images.php?title=')
            // }
        }
        
    }
    
    function singleHeader($connection, $type) {
        
        echo '<div class="panel panel-info">';
        
        if($type == "countries") {
            
            $dbCount = new CountriesGateway($connection);
            $countF = $dbCount -> getFields(Array(2)); // CountryName
            $sqlCount = 'SELECT ' . $countF . ' FROM ' . $dbCount -> getFrom() . ' WHERE ';
            echo $sqlCount;
            $countInfo = $dbCount -> getById($sqlCount, $_GET['id'], 0);
            
            echo '<div class="panel-heading">Images from ' . $countInfo['CountryName'] . '</div>';
            
        } else if($type == "users") {
            
            $dbUse = new UsersGateway($connection);
            $useF = $dbUse -> getFields(Array(0,1)); // FirstName, LastName
            $sqlUse = 'SELECT ' . $useF . ' FROM ' . $dbUse -> getFrom() . ' WHERE ';
            // echo $sqlUse;
            $useInfo = $dbUse -> getById($sqlUse, $_GET['id'], 0);
            echo '<div class="panel-heading">Images from ' . $useInfo['FirstName'].' ' . $useInfo['LastName']. '</div>';
            
        }
        
        identifyType($connection, $type);
        
    }
    
    // calls another function to show appropriate images via query string for single page CHANGE INTO Gateways
    function identifyType($connection, $type) {
        
        $object = "";
        
        if($type == "countries") {
            
            $dbCnty = new CountriesGateway($connection);
            $dbIma = new ImagesGateway($connection);
            
            $cntyF = $dbCnty -> getFields(Array(2)); // CountryName
            $imaF = $dbIma -> getFields(Array(0,2,6)); // ImageID, Title, Path
            $sql1 = 'SELECT ' . $cntyF . ', ' . $imaF . ' FROM ' . $dbCnty -> getFrom() . 
            ' JOIN ' . $dbIma -> getFrom() .
            ' WHERE ' . $dbCnty -> getFields(Array(0)) . 
            ' = ' . $dbIma -> getFields(Array(5)) . ' AND '; 
            // echo $sql1 . '<br>';
            $object = $dbCnty -> getById($sql1, $_GET['id'], 1);
            
                                     
        } else if($type == "users") {
            
        'SELECT Users.UserID, FirstName, LastName, Path, ImageID FROM Users JOIN ImageDetails
                    WHERE Users.UserID = ImageDetails.UserID AND Users.UserID =?';
            
            $dbUs = new UsersGateway($connection);
            $dbIma = new ImagesGateway($connection);
            
            $usF = $dbUs -> getFields(Array(0,1,10)); // FirstName, LastName, Users.UserID
            $imaF = $dbIma -> getFields(Array(0,2,6)); // ImageID, Title, Path
            $sql2 = 'SELECT ' . $usF . ', ' . $imaF . ' FROM ' . $dbUs -> getFrom() . 
            ' JOIN ' . $dbIma -> getFrom() .
            ' WHERE ' . $dbUs -> getFields(Array(10)) .
            ' = ' . $dbIma -> getFields(Array(1)) . ' AND ' . $dbUs -> getFrom() . '.';
            
            // echo $sql2;
            
            $object = $dbUs -> getById($sql2, $_GET['id'], 1);
                                       
        }
        
        
        showImg("singles", $object); 
        echo '</div>'; // close panel-info
    }
    
    function dropdown($connection, $type) {
        
        if($type == "continent") {
            
            $dbCont = new ContinentsGateway($connection);
            $contF = $dbCont -> getFields(Array(0, 1)); // ContinentCode, ContinentName
            
            $sqlCont = 'SELECT ' . $contF . ' FROM ' . $dbCont -> getFrom();
            $result = $dbCont -> findAllSorted($sqlCont, "orderBy"); // ORDER BY ContinentName
            
            foreach($result as $conti) {
                echo '<option value="' . $conti['ContinentCode'] . '">' . $conti['ContinentName'] . '</option>';
            }
            
            
        } else if($type == "country") {
            
            $dbCount = new CountriesGateway($connection);
            $dbImg = new ImagesGateway($connection);
            $countF = $dbCount -> getFields(Array(0, 2)); // Countries.ISO, CountryName
            
        
            $sqlCount = 'SELECT ' . $countF . ' FROM ' . $dbCount -> getFrom() .
                        ' JOIN ' . $dbImg -> getFrom() .
                        ' WHERE ' . $dbCount -> getFields(Array(0)) . ' = ' . $dbImg -> getFields(Array(5));
            $result = $dbCount -> findAllSorted($sqlCount, "groupBy"); // GROUP BY ISO
            
            foreach($result as $cntry) {
                echo '<option value="' . $cntry['ISO'] . '">' . $cntry['CountryName'] . '</option>';
            }
            
        } else if($type == "city") {
                          
            $dbCity = new CitiesGateway($connection);
            $dbImg = new ImagesGateway($connection);
            $cityF = $dbCity -> getFields(Array(0, 7)); // AsciiName, Cities.CityCode
            
            $sqlCity = 'SELECT ' . $cityF . ' FROM ' . $dbCity -> getFrom() .
                        ' JOIN ' . $dbImg -> getFrom() .
                        ' WHERE ' . $dbCity -> getFields(Array(7)) . ' = ' . 
                        $dbImg -> getFrom() . '.' . $dbImg -> getFields(Array(4));
            $result = $dbCity -> findAllSorted($sqlCity, "both"); // ORDER BY AsciiName
            
            foreach($result as $city) {
                echo '<option value="' . $city['CityCode'] . '">' . $city['AsciiName'] . '</option>';
            }
        }
        
    }
    
    function filterHeader($connection) {
        
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
                
                    filterImg($connection); // calls to retrieve what has been filtered
                    
                echo '</div>';
            
        echo '</div>'; // close panel-default
        
    }
    
    function filterImg($connection) {
        
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            
            $dbImg = new ImagesGateway($connection);
            $startSql = 'SELECT ' . $dbImg -> getFields(Array(0, 2, 6)) . ' FROM '; // ImageID, Title, Path
            // echo $startSql;
            $sql = ""; $result = "";
            
            if((!isset($_GET['continent']) && !isset($_GET['country']) && !isset($_GET['city'])) || ($_GET['country'] == "0" && $_GET['continent'] == "0" && $_GET['city'] == "0" && $_GET['title'] == "")) {
                $sql = $startSql . $dbImg -> getFrom();
                // echo $sql;
                $result = $dbImg -> runQuery($sql, null, 0);
            } else if(isset($_GET['continent']) && $_GET['continent'] != "0") {
                
                $dbCont = new ContinentsGateway($connection);
                
                
                $sql = $startSql . $dbCont -> getFrom() . ' JOIN ' . $dbImg -> getFrom() .
                        ' USING(' . $dbCont -> getFields(Array(0)) . ')' .
                        ' WHERE ' . $dbCont -> getFrom() . '.';
                        
                $result = $dbCont -> getById($sql, $_GET['continent'], 1);
                
                // echo $sql;
                
            }
            
            // echo $result;
            showImg("filtering", $result);
            
        }
        
    }   
        
    function showImg($page, $object) {
        
        foreach($object as $img) {
            
            if($page == "singles") {
               
                echo '<div class="smallImg" onmouseover="popIn('.$img['ImageID'].')" onmouseout="popOut('.$img['ImageID'].')">';
                    
                    echo '<a href="single-image.php?id=' . $img['ImageID'] . '"><img src="images/square-small/' . $img['Path'] . '"></a>';
                
                echo '</div>'; // close images div 
                
                 echo '
                <div class="popS" id='.$img['ImageID'].' >';// popover small image
                    echo '<h6 >'.$img['Title'].'</h6>';
                    echo '<img src="images/square-small/' . $img['Path'] . '">';
                
                echo '
                
                </div>'; 
                
                ?>
                <script>
                    function popIn(c){
                        var x = event.clientX;
                        var y = event.clientY;
                        var snowball = document.getElementById(c);
                         snowball.style.visibility="visible";
                        snowball.style.position = "absolute";
                        snowball.style.right = x + 'px';
                        snowball.style.top = y + 'px';
                        
                    }
                    function popOut(p){
                        document.getElementById(p).style.visibility="hidden";
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
            
        
        } // close loop
    
    
    }
    
    
    function mapp($connection){
            
            $dbCoun = new CountriesGateway($connection);
            $counInfo = $dbCoun -> getFields(Array(0,2)); // ISO
            $dbIm = new ImagesGateway($connection);
            $imInfo = $dbIm -> getFields(Array(5,7,8)); // CountryCodeISO, Longtitude, Latitude
            
            
            $sqlCoun = ' SELECT ' . $imInfo . ' , ' . $counInfo. 
                        ' FROM ' . $dbIm -> getFrom() . 
                        ' JOIN ' . $dbCoun->getFrom() .
                        ' ON ' . $dbCoun -> getFields(Array(0)) .
                         ' = ' . $dbIm -> getFields(Array(5)) .
                         ' WHERE ';
                        $coordinates = $dbCoun -> getById($sqlCoun, $_GET['id'], 0);
            //echo $sqlCoun;
                        
                        // $fee = 66;
                        // echo $fee;
                        
                       $lat = $coordinates['Latitude'];
                        $long = $coordinates['Longitude'];
                       
                        
                        
?>
<script>

function initMap() {
        document.write("<div id='map' style='width:95%;height:400px;'></div>");
        var uluru = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8izLDbgoSU5XQQhwjGI_c3L1OnnJ1lkU&callback=initMap">
    </script>
<?php
}
    
    
?>