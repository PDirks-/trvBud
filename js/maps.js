/*
 * maps.js - inits googlemaps api
 */

console.log("beeep");

var map;
function initialize() {
  var mapOptions = {
    zoom: 4,
    center: new google.maps.LatLng(40, -95)
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);
