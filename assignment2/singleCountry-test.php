<?php
    
    function stuff() {
        echo '<table>';
        echo '<tr> 
                <th><h4>Country Information</h4></th> 
                <th><h4>Related Images</h4></th> 
            </tr>';
        echo '<tr>
                <td>
                    <div id="map"></div>
                    <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIZnr66nMz2I-p9XM2Cl4bUA4fzVjMgwE&callback=initMap">
                    </script>
                </td>
                
                <td>Images Images Images Images Images Images Images Images Images Images Images Images </td>
             </tr>';
        // echo '<tr><td></td></tr>';
        // echo '<tr><td></td></tr>';
        
        echo '<tr>
                <td><p><strong>Country: </strong>' . $countryInfo['CountryName'] . '</p></td>
             </tr>';
        echo '<tr>
                <td><p><strong>Capital: </strong>' . $countryInfo['Capital'] . '</p></td>
             </tr>';
        echo '<tr>
                <td><p><strong>Area: </strong>' . number_format($countryInfo['Area']) . '</p></td>
             </tr>';
        echo '<tr>
                <td><p><strong>Population: </strong>' . number_format($countryInfo['Population']) . '</p></td>
             </tr>';
        echo '<tr>
                <td><p><strong>Currency Name: </strong>' . $countryInfo['CurrencyName'] . '</p></td>
             </tr>';
        echo '<tr>
                <td><p>' . $countryInfo['CountryDescription'] . '</p></td>
             </tr>';
        echo '</table>';        
        
    }
    
    
    
    // $statement -> bindValue(1, $_GET['id']);
    // $statement -> execute();
    // $countries = $statement -> fetch();
    
    // echo '<h3>' . $countries['CountryName'] . '</h3>';
    // echo '<p>Capital: <span class="bold">' . $countries['Capital'] . '</span></p>';
    // echo '<p>Area: <span class="bold">' . number_format($countries['Area']) . '</span> sq km.</p>';    
    // echo '<p>Population: <span class="bold">' . number_format($countries['Population']) . '</span></p>';
    // echo '<p>Currency Name: <span class="bold">' . $countries['CurrencyName'] . '</span></p>';
    // echo '<p>' . $countries['CountryDescription'] . '</p>';
        
?>