<html>
<body>





<?php

if(isset($_COOKIE['enroll_no'])){
include('functions.php');

$lat=$_GET['latitude'];
$hash=$lat;

/*
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





$long=$_GET['longitude'];



echo 'jumbled longitude';
line_break();

for($x=0;$x<strlen($hash);$x++)
{
   if($x==2)
   echo '.';
   echo $hash[$x];
}

line_break();

echo 'unjumbled longitude';
line_break();

$str=deCrypt($hash);
for($x=0;$x<count($str);$x++)
{
   if($x==2)
   echo '.';
   echo $str[$x];
}
line_break();

*/



$ret=verify();
if($ret==1){


   $lat=decrypt($_GET['latitude']);
   $long=decrypt($_GET['longitude']);
   
   
   $x=(double)stringToNumber($lat);
   $y=(double)stringToNUmber($long);
 
    echo $x; line_break(); echo $y;  
   
  // echo $x; echo "  "; echo $y;
   //echo dump_array($lat); line_break(); echo dump_array($long);
   
  
   
$servername="localhost";
$username="usr";
$password="admin@1224";
$dbname="bpitattendance";
$conn = new mysqli($servername, $username, $password, $dbname);


$enroll=$_COOKIE['enroll_no'];
$sql = "INSERT INTO attendance (enroll_num,latitude,longitude,is_present)
VALUES ('$enroll','$x','$y','0')";

mysqli_query($conn, $sql);



echo 'Attendance Marked!!!!';
line_break();

//header("Location:https://bpitattendance.online/shubham/html/unset.php");

   
   
} 



else{
echo 'Attendance Already Marked using this IP Address !!!!!!';
line_break();
//header("Location:https://bpitattendance.online/shubham/html/unset.php");
}


}

else {header("Location:https://bpitattendance.online/shubham/html/authenticate.html");}

?>

</body>

</html>
