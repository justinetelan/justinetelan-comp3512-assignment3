<?php


function mapp($connection){
            $dbCoun = new CountriesGateway($connection);
            $dbIm = new ImagesGateway($connection);
            $counInfo = $dbCoun -> getFields(Array(0,2)); // ISO
            
            $imInfo = $dbIm -> getFields(Array(5,7,8)); // CountryCodeISO, Longtitude, Latitude
            
            
            $sqlCoun = ' SELECT ' . $imInfo . ' , ' . $counInfo. 
                        ' FROM ' . $dbIm -> getFrom() . 
                        ' JOIN ' . $dbCoun->getFrom() .
                        ' ON ' . $dbCoun -> getFields(Array(0)) .
                         ' = ' . $dbIm -> getFields(Array(5)) .
                         ' WHERE ';
                        $coordinates = $dbIm -> getById($sqlCoun, $_GET['id']);
            echo $sqlCoun;
                        
                        
                        
                        echo $coordinates['CountryName'];
                        

?>
<script>

function myMap() {
    
    var long = "<?php echo $coordinates['Longitude']; ?>";
    
    var lat = "";
    
    var mapProp= {
    
    center:new google.maps.LatLng(long,lat),
    zoom:4,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAtFhIrvtqf7fVR4am3VBYbQmxRi8AuGVo&callback=myMap"></script>
<?php
}

?>