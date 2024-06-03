<?php

include('functions.php');

if(isset($_POST['latitude'])){
$lat=$_POST['latitude'];
$long=$_POST['longitude'];

$latToArray = PositionToNumeric($lat);
$lattoString = toStringfromArray($latToArray);

$hash=hashed($lattoString);



//$hash=hashed($lattoString);

$qr='http://194.135.85.122/shubham/html/verify.php?latitude='.$hash.'';
getQR($qr);
}
?>