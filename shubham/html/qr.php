<?php

include('functions.php');

if(isset($_POST['latitude'])){
$lat=$_POST['latitude'];
$long=$_POST['longitude'];

$latToArray = PositionToNumeric($lat);
$lattoString = toStringfromArray($latToArray);

$longToArray = PositionToNumeric($long);
$longtoString = toStringfromArray($longToArray);

$hashLat=hashed($lattoString);
$hashLong=hashed($longtoString);




//$hash=hashed($lattoString);

$qr='https://bpitattendance.online/shubham/html/verify.php?latitude='.$hashLat.'&longitude='.$hashLong.'';
getQR($qr);

//echo $hash;

//line_break();

//dump_array(deCrypt($hash));

}

?>