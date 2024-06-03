

<html>

<head>



<style>

table

{

border-style:solid;

border-width:2px;

border-color:pink;

}

</style>

</head>

<body bgcolor="#EEFDEF">




<?php
if(!isset($_POST['latitude'])||!isset($_POST['longitude']))
header("Location: https://bpitattendance.online/shubham/html/checkAttendance.php");

include 'functions.php';
include 'SimpleXLSXGen.php';

$servername="localhost";
$username="usr";
$password="admin@1224";

$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];

$output;  $ret;
exec ("Auth/auth_exe $latitude $longitude",$ret,$output);

//print_r ($ret);
line_break();
//print_r($output);
line_break();


line_break();


$conn = new mysqli($servername,$username,$password,"bpitattendance");
$conn_name = new mysqli($servername,$username,$password,"main_bpitattendance_db");
$query="SELECT * FROM `attendance`";

$result=mysqli_query($conn,$query);


echo "<table border='1'>

<tr>

<th>Enrollment Number</th>

<th>Name</th>

<th>Present</th>

</tr>";

$data_excel = array();
$idx=0;

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))

  {

  echo "<tr>";
  
   echo "<td>" . $row['enroll_num'] . "</td>";
  
   //Query to fetch Student's Name from Main STUDENT_RECORD DATABASE  
   $query_name="SELECT stud_first_name FROM `student_record` WHERE enrollment_no=".$row['enroll_num']."";
   $result_name=mysqli_query($conn_name,$query_name);
   $final_name = mysqli_fetch_array($result_name,MYSQLI_ASSOC);
   
   if(isset($final_name['stud_first_name']))
   echo "<td>" . $final_name['stud_first_name'] . "</td>";
  
   else echo "<td>"; echo"</td>";
   
  if($row['is_present']==1)
  echo "<td bgcolor="."MediumSeaGreen".">" . $row['is_present'] . "</td>";
  else
  echo "<td bgcolor="."tomato".">" . $row['is_present'] . "</td>";
  
  $data_excel[$idx]=array();
  $data_excel[$idx]['enrollment_number']=$row['enroll_num'];
  if(isset($final_name['stud_first_name']))
  $data_excel[$idx]['Student Name']=$final_name['stud_first_name'];
  if(!isset($final_name['stud_first_name']))
  $data_excel[$idx]['Student Name']=" ";
  if($row['is_present']==1)
  $data_excel[$idx]['Present']="Present";
  if($row['is_present']==0)
  $data_excel[$idx]['Present']="Absent";
  $idx=$idx+1;



  echo "</tr>";

  }

$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $data_excel);
 
echo"<button onclick="; echo"\""; 
echo"<?php "; echo"phpinfo();"; echo"?>"; 
 echo"\""; 
 echo">Click me</button>";

if(isset($_POST['butt']))
$xlsx->downloadAs('books.xlsx');


?>

</body>

</html>



