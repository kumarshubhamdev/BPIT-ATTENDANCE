<?php

/*
[function PositionToNumeric($string)]

Function to convert string to numeric array

[ARGUMENT]
function takes string as argument 

[FUNCTION]
->converts string to a numeric array , holding co-Ordinates in pure numeric form , without decimal and unncessary values
->it returns an ARRAY , NOT a STRING

*/

function PositionToNumeric($string)

{

$len=strlen($string);
$x=0;
$lat=[];
$idx=0;

while($len>$x){
if($string[$x]!='.')
$lat[$idx++]=$string[$x];
$x++;
}

return $lat;
}


/*
[function dump_array($arr)]
prints the array in normal form , unlike PHP arr_dump() that shows index + some extra useless values!

[ARGUMENT]
Array variable

[FUNCTION]
prints the array , NOTHING is RETURNED


*/

function dump_array($arr)
{
   for($x=0;$x<count($arr);$x++)
   echo $arr[$x];
   
   echo "<br>";

}



/*

[function validCoordinates()]

A boolean value return function that takes 4 Co-Ordinates array 

[ARGUMENTS]
--->latitudeA ---> latitude array of teacher
--->longitudeA ---> longitude array of teacher

--->latitudeB ---> longitude array of student
--->longitudeB ---> longitude array of student

[FUNCTION]
if Co-ordinates of student and teacher are within bounds return true , else return false

[SIZE]
Each array is EXACTLY of size 9 units , that is index is from 0 --> 8
*/

function validCoordinates()
{



}




/*
[line_break();]

[FUNCTION]
prints a new line
*/


function line_break()
{
   echo "<br>";

}


/*
[getQR(string)]

[FUNCTION]
generates the corresponding QR of a given string 

[ARGUMENT]
string is taken , as phpQRCODE library is used to generate the QR




*/

function getQR($string)
{
   include('lib/qrlib.php');
   
   QRcode::png($string);


}


/*
[toStringArray]
function to convert array to string

[ARGUMENT]
string is passed 

[RETURN VALUE]
a string is returned

*/

function toStringfromArray($array)
{
  $changed = implode("",$array);
  return $changed;

}



function isPresent()
{



}

/*
[hashed($latitudeString)]

[FUNCTION]
takes a string latitude in normal form , and return hasehd jumbled form

[RETURN]
returns a jumble string
*/

function hashed($latitudeString)
{

//include('functions.php');
$latitudeArray = PositionToNumeric($latitudeString);

$permutation=array(
array(0,0),
array(1,8),
array(2,4),
array(3,5),
array(4,6),
array(5,7),
array(6,1),
array(7,2),
array(8,3));

$jumbledLatitude;

$size=sizeof($latitudeArray);


for($x=0;$x<count($latitudeArray);$x++)
$jumbledLatitude[($permutation[$x][0])]=$latitudeArray[($permutation[$x][1])];

$hashedLatitude = toStringfromArray($jumbledLatitude);

return $hashedLatitude;


}




/*
[deCrypt($latitudeString)]

[FUNCTION]
takes a hashed $latitudeString , deCrypt it to original form 

[RETURN]
return a decrypted Array of latitude

*/

function deCrypt($latitudeString)
{

$latitudeArray = PositionToNumeric($latitudeString);

$permutation=array(
array(0,0),
array(1,8),
array(2,4),
array(3,5),
array(4,6),
array(5,7),
array(6,1),
array(7,2),
array(8,3));



$unjumbledLatitude;

$size=sizeof($latitudeArray);

for($x=0;$x<count($latitudeArray);$x++)
$unjumbledLatitude[($permutation[$x][1])]=$latitudeArray[($permutation[$x][0])];


return $unjumbledLatitude;

}


/*
To retireve client ip address
Literally copied from Stack-Overflow!!!:) ;)

*/



function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


function verify()
{

$ip=get_client_ip();


$servername = "localhost";
$username = "usr";
$password = "admin@1224";
$dbname = "ip";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

else{
$foo=True;
$query="SELECT * from address";
$result=mysqli_query($conn,$query);
//$row=mysqli_fetch_row($result);
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    if($row[0]==$ip)
    {
      // echo 'BHAAG SAALE CHEATER';
       $foo=False;
       line_break();
    }
    line_break();
}

if($foo==True){
$sql = "INSERT INTO address (address)
VALUES (?)";
$stmt=$conn->prepare($sql);
$stmt->bind_param("s",$ip);
$stmt->execute();
$conn->close();

//redirect to Junet's Verification Code
return 1;

}

else if($conn){
//echo 'IP ADDRESS ALREADY USED!!!!!';

return 0;
line_break();
}

}

}



function stringToNumber($str)
{

$converted=0;

for($x=0;$x < count($str);$x++)
{
   $converted=$converted*10+(ord($str[$x])-48);
}

//$converted=strrev($converted);
$converted /= 10000000;
return $converted;
}


?>
