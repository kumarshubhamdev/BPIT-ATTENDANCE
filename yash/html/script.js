const x = document.getElementById("demo");
const inplat = document.getElementById("lat");
const inplong = document.getElementById("long");
let lat;
let lon;
inplat.value = "";
inplong.value = "";

getLocation();
//checkbox label listener
const cblabel = document.querySelector(".button")
const cb = document.getElementById("button");

cb.checked = false;

cb.addEventListener("change", ()=>{
  animation();
})

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

lat = (Math.round(lat * 1000000000) / 1000000000).toFixed(9);
lon = (Math.round(lon * 1000000000) / 1000000000).toFixed(9);

console.log("in showposition()")

  x.innerHTML = "Latitude: " + lat + 
  "<br>Longitude: " + lon;
  inplat.value = lat;
  inplong.value = lon;

cblabel.classList.toggle("disabled");
  
  
}


function animation(){
setTimeout(function() {
  //your code to be executed after x seconds
  document.getElementById("submitbtn").click();
  cb.checked= false;
}, 3500);

}