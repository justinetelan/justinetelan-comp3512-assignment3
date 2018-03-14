

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
        
        $result = $dbPost -> getById($sql, $_GET['id']);
        
        echo '<br>';
        
        echo $sql;
        
        echo '<br>'; echo '<br>';
        
        echo "<div class='col-md-8'>";
        
        echo "<img class='img-responsive' ";
        
        echo "src='images/medium/" . $result['Path'] . "' alt='" . $result['Title'] . "'>";
        echo "<p>" . $result['Message'] . "</p>";
    
        echo "</div>"; // close col-md-8
        
        echo "<div class='col-md-4'>";
        
        echo "<h2>" . $result['Title'] . "</h2>";
        
        echo "<div class='panel panel-default'>";
            echo "<div class='panel-body'>";
                echo "<ul class='details-list'>";
                    echo "<li>By: <a href='single-user.php?id=" . $result['UserID'] . "'>" . $result['FirstName'] . " " . $result['LastName'] . "</a></li>";
                    echo "<li>" . $result['PostTime'] . "</li>";
                echo "</ul>";
            echo "</div>";
        echo "</div>";
        
        relatedImg($connection);
        
    }
    
    function relatedImg($connection) {
        
        $dbPost = new PostsGateway($connection);
        $dbImg = new ImagesGateway($connection);
        $dbPostImg = new PostImagesGateway($connection);
        
        // $postF = $dbPost -> getFrom() . '.' . $dbPost -> getFields(Array(0)); // PostID
        $imgF = $dbImg -> getFields(Array(6)); // Path
        $imgID = $dbPostImg -> getFrom() . '.' . $dbPostImg -> getFields(Array(0));
        $postID = $dbPostImg -> getFrom() . '.' . $dbPostImg -> getFields(Array(1));
        // $postImgF = $dbPostImg -> getFields(Array(0, 1));
        
        $sql = 'SELECT ' . $imgF . ', ' . $imgID . ', ' . $postID . //$postF . ', ' . $imgF . ', ' . $postImgF .
                ' FROM ' . $dbImg -> getFrom() . ' JOIN ' . $dbPostImg -> getFrom() .
                ' USING(' . $dbPostImg -> getFields(Array(0)) . ') ' .
                ' WHERE ';
                
        $result = $dbPost -> getById($sql, $_GET['id']);
        
        echo '<br>';
        
        echo '<img src="images/square-small/' . $result['Path'] . '">';       
        
        
        
        // echo $result['Path'];
        
        // ADD A FOR LOOP HERE TO DISPLAY ALL IMAGES
        // echo '<div class="smallImg">';
        
        //     echo '<a href="single-image.php?id=' . $result['ImageID'] . '"><img src="images/square-small/' . $result['Path'] . '"></a>';
        
        // echo '</div>'; // close images div        
        
    }
    
    function countryInfo($connection) {
        $dbCountry = new CountriesGateway($connection);
        
        //CountryName, Capital, Area, Population, CurrencyName, CountryDescription
        $countryF = $dbCountry -> getFields(Array(2, 3, 5, 6, 10, 14));
        
        $sqlInfo = 'SELECT ' . $countryF . ' FROM ' . $dbCountry -> getFrom() . ' WHERE ';
        
        $countryInfo = $dbCountry -> getById($sqlInfo, $_GET['id']);
        
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
    
    
    
    // function browseImg($connection, $type){
    //     if($type == "continent") {
          
    //      $dbContinents = new ContinentsGateway($connection);
        
    //     $postF = $dbContinents -> getFields(Array(0, 1));
    //     $result = $dbContinents -> runQuery($sql, null, 0);
          
    //       foreach ($conti = $statement -> fetch()) {     
    //         echo '<option value="' . $conti['ContinentCode'] . '">' . $conti['ContinentName'] . '</option>';
    //       }
          
    //     } else if($type == "country") {
          
    //       $countrySql = 'SELECT CountryName, ISO FROM Countries JOIN ImageDetails
    //                       WHERE Countries.ISO = ImageDetails.CountryCodeISO GROUP BY ISO';
    //       $statement = $pdo -> prepare($countrySql);
    //       $statement -> execute();
          
          
    //       while($countries = $statement -> fetch()) {
    //           echo '<option value="' . $countries['ISO'] . '">' . $countries['CountryName'] . '</option>'; 
    //       }
          
    //     } else if($type == "city") {
          
    //       $citySql = 'SELECT AsciiName, Cities.CityCode FROM Cities JOIN ImageDetails
    //                       WHERE Cities.CityCode = ImageDetails.CityCode GROUP BY AsciiName ORDER BY AsciiName';
    //       $statement = $pdo -> prepare($citySql);
    //       $statement -> execute();
          
    //       while($city = $statement -> fetch()) {
    //           echo '<option value="' . $city['CityCode'] . '">' . $city['AsciiName'] . '</option>'; 
    //       }
          
    //     }
        
    //     $pdo = null; // close connection
    // }
    
    function singleHeader($connection, $type) {
        
        echo '<div class="panel panel-info">';
        
        if($type == "countries") {
            
            $dbCount = new CountriesGateway($connection);
            $countF = $dbCount -> getFields(Array(2)); // CountryName
            $sqlCount = 'SELECT ' . $countF . ' FROM ' . $dbCount -> getFrom() . ' WHERE ';
            echo $sqlCount;
            $countInfo = $dbCount -> getById($sqlCount, $_GET['id']);
            
            echo '<div class="panel-heading">Images from ' . $countInfo['CountryName'] . '</div>';
            
        } 
        
        // else if($type == "users") {
            
        //     $dbUse = new UsersGateway($connection);
        //     $useF = $dbUse -> getFields(Array(0,1)); // FirstName, LastName
        //     $sqlUse = 'SELECT ' . $useF . ' FROM ' . $dbUse -> getFrom() . ' WHERE ';
        //     echo $sqlUse;
        //     $useInfo = $dbUse -> getById($sqlUse, $_GET['id']);
        //     echo '<div class="panel-heading">Images from ' . $useInfo['FirstName'].' ' . $useInfo['LastName']. '</div>';
            
        // }
        
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
            $sql1 = 'SELECT ' . $cntyF . ', ' . $imaF . 
            ' FROM ' . $dbCnty -> getFrom() . ' JOIN ' . $dbIma -> getFrom() .
            ' WHERE ' . $dbCnty -> getFrom(). '.' .$dbCnty -> getFields(Array(0)) .
            ' = ' . $dbIma -> getFrom() . '.' . $dbIma -> getFields(Array(5)) . ' AND ' . $dbCnty -> getFrom() . '.';
            // echo $sql1;
            $object = $dbCnty -> getById($sql1, $_GET['id']);
            
                                     
        } 
        
        // else if($type == "users") {
            
        //     $dbUs = new UsersGateway($connection);
        //     $usF = $dbUs -> getFields(Array(0,1,10)); // firstname, lastname, users.userid
        //     $dbIma = new ImagesGateway($connection);
        //     $imaF = $dbIma -> getFields(Array(0,1,2,6)); // ImageID, Title, Path
        //     $sql2 = 'SELECT ' . $usF . ', ' . $imaF .
        //     ' FROM ' . $dbUs -> getFrom() . 
        //     ' JOIN ' . $dbIma -> getFrom() .
        //     ' WHERE ' . $dbUs -> getFrom(). '.' .$dbUs -> getFields(Array(10)) .
        //     ' = ' . $dbIma -> getFields(1);
            
        //     /*$statement = $pdo -> prepare('SELECT Users.UserID, FirstName, LastName, Path, ImageID FROM Users JOIN ImageDetails
        //                                 WHERE Users.UserID = ImageDetails.UserID AND Users.UserID =?');*/
        //         $object = $dbUs -> getById($sql2, $_GET['id']);
                                       
        // }
        
        
        // echo $object;
        showImg("singles", $object); 
        echo '</div>'; // close panel-info
    }
        
        
    function showImg($page, $object) {
        
        // echo count($object) . ' ' . $object . '<br>';
        
        // echo $object['Path'] . '<br>';
        // echo $object['ImageID'] . '<br>';
       
        
        foreach($object as $key => $value) {
            
            // print_r($object) . '<br>';
            
            if($page == "singles") {
                // echo 'works';
                echo $value . ' ' ;
            }
            
        }
        
        // $i = 0;
        
        //foreach($object as $key => $info) {// while(empty($object)) {
        
            // echo $object['Path'];
            
            // $i++;
        
            // if($page == "singles") {
                
                // // echo '<div class="smallImg" onmouseover="popOut('.$print['ImageID'].')" onmouseout="popIn('.$print['ImageID'].')">';
                // echo '<div class="smallImg">';
                //     echo '<a href="single-image.php?id=' . $print['ImageID'] . '"><img src="images/square-small/' . $print['Path'] . '"></a>';
                
                // echo '</div>'; // close images div
                
                
                // echo '<div class="cls">
                // <div id='.$print['ImageID'].' >';// popover small image
                //     echo '<h6 >'.$print['Title'].'</h6>';
                //     echo '<img src="images/square-small/' . $print['Path'] . '">';
                
                // echo '
                // </div>
                // </div>'; 
            // }
                
                // close php here
                // <script>
                //     function popIn(x){
                //         document.getElementById(x).style.visibility="hidden";
                //     }
                //     function popOut(x){
                //         document.getElementById(x).style.visibility="visible";
                //     }
                // </script>
            
             // open php here again
            // } else if($page == "filtering") {
                
            //     echo '<li>';
            //     echo '<a href="single-image.php?id=' . $img['ImageID'] . '"><img src="images/square-medium/' . $img['Path'] . '">';
            //     echo '<div class="caption">';
            //         echo '<div class="blur"></div>';
            //             echo '<div class="caption-text">';
            //                 echo '<p>' . $img['Title'] . '</p>';
            //             echo '</div>'; // close caption-text
            //     echo '</div></a>'; // close caption
            //     echo '</li>';
                
            // }
            
        
        // } // close loop
    
    
    }
    
?>