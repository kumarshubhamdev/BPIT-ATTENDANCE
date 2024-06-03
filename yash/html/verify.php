<?php
include('functions.php');

$lat=$_GET['latitude'];
$hash=$lat;


echo 'jumbled latitude';
line_break();

for($x=0;$x<strlen($hash);$x++)
{
   if($x==2)
   echo '.';
   echo $hash[$x];
}

line_break();

echo 'unjumbled latitude';
line_break();

$str=deCrypt($hash);
for($x=0;$x<count($str);$x++)
{
   if($x==2)
   echo '.';
   echo $str[$x];
}
line_break();


?>