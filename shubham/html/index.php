<?php
?>



<!DOCTYPE html>
<html>
<body>
<h1>HTML Geolocation</h1>
<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>


<form action="qr.php" method="post">
Latitude: <input type="text" name="latitude" id="lat"><br>
Longitude: <input type="text" name="longitude" id="long"><br>
<input type="submit" value="Attend">
</form>


<script>
const x = document.getElementById("demo");
const inplat = document.getElementById("lat");
const inplong = document.getElementById("long");
let lat;
let lon;
let fs = require('fs');

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {


lat = position.coords.latitude;
lon = position.coords.longitude;

console.log("in showposition()")

  x.innerHTML = "Latitude: " + lat + 
  "<br>Longitude: " + lon;
  
  inplat.value = lat;
  inplong.value = lon;
  
  WriteToFile()
  
}

function WriteToFile() {

  console.log("in WriteToFile()")

    fs.appendFile('mynewfile1.txt', 'Hello content!', function (err) {
      if (err) throw err;
      console.log('Saved!');
    });
 }

</script>

</body>
</html>


