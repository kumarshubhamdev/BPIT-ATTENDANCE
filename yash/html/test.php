<?php
include('functions.php');


$lat=28.4950;
$long=77.1031;

$latA=28.5737;
$latB=77.0710;

echo haversine($lat,$long,$latA,$latB);


?>