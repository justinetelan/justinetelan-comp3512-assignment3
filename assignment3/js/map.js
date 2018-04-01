function initMap() {
    // document.write("<div id='map' style='width:95%;height:400px;'></div>");
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