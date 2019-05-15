// Create Map
var map = L.map('map').setView([51.4545, -2.5879], 13);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
}).addTo(map);

// Get Markers
fetch('https://refill-free.firebaseio.com/markers.json')
.then(function(response) {
  return response.json();
})
.then(function(markers) {
  if(markers) {
    Object.keys(markers).map(function(key, index) {
      let marker = L.marker([
        markers[key].coordinates.latitude,
        markers[key].coordinates.longitude
      ]).addTo(map);
      marker.bindPopup(markers[key].title);
    });
  }
});
    
// Create Modal
MicroModal.init();

// Set Form Lat Lng
map.on('click', function(e){
  MicroModal.show('modal-1');
  center = map.getCenter();
  document.getElementById('input-latitude').value = e.latlng.lat;
  document.getElementById('input-longitude').value = e.latlng.lng;
});

// Submit form to firebase
var form = document.getElementById("add-station-form");

form.addEventListener('submit', function(event) {
  event.preventDefault(); 

  var formData = new FormData(form);
  var marker = {};
  formData.forEach(function(value, key){
  marker[key] = value;
  });
  var formatedMarker = {
    title: marker.title,
    coordinates: {
      latitude: parseFloat(marker.latitude),
      longitude: parseFloat(marker.longitude)
    }
  };  
  
  sendToModerate(formatedMarker);
  // postToFirebase(formatedMarker);
  MicroModal.close('modal-1'); 

});

function postToFirebase(marker) {
  fetch("https://refill-free.firebaseio.com/markers.json", {
    body: JSON.stringify(formatedMarker),
    headers: {
        "Content-Type": "application/json",
    },
    method: "post",
  }).then(function(response) {
    return response.json();
  }).then(json => {
    // TODO resync markers
    location.reload();
  });
}




function sendToModerate(marker) {
  var comment = new wp.api.models.Comment( {
    post: 1,
    author_name: 'Add Station Request',
    author_email: 'add.station@refill.com',
    content: marker.title,
    latitude: parseFloat(marker.coordinates.latitude),
    longitude: parseFloat(marker.coordinates.longitude),
    status: 'hold'
  });
  comment.save().done(res=>{console.log(res)}); 

}

