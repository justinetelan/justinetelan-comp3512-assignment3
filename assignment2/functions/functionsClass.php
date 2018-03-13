<?php

    function singlePost($connection) { // USED COMMA JOIN
        
        $dbPost = new PostsGateway($connection);
        $dbImg = new ImagesGateway($connection);
        $dbUser = new UsersGateway($connection);
        
        // get UserID from Posts instead OR Users
        $postF = $dbPost -> getFields(Array(2, 3, 4, 5)); // MainPostImage, Title, Message, PostTime
        $imgF = $dbImg -> getFields(Array(0, 6)); // UserID, Path
        $userF = $dbUser -> getFields(Array(0, 1)); // FirstName, LastName
        
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
                    echo "<li>By: " . $result['FirstName'] . " " . $result['LastName'] . "</a></li>";
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
        
        echo $sql;       
        
        foreach($result as $row) {
            echo '<div class="smallImg">';
            
                echo '<a href="single-image.php?id=' . $result['ImageID'] . '"><img src="images/square-small/' . $result['Path'] . '"></a>';
            
            echo '</div>'; // close images div               
        }
        
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
    
    function browse($connection){
        
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
?>