function initMap() {
    
    // make array containing country, longitude, latitude
    var country = [ { country: "", lat: 0, lng: 0 } ];
    
    // pass the lat and lng depending on the id
    var uluru = {lat: 56.130, lng: -106.347};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 4,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map
    });
}