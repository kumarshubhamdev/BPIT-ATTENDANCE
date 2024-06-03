<?php
  session_start();
  
  include("db.php");
  include("../../junet/html/encrypt_password.inc.php");
  include ("../../junet/html/hash_gen.inc.php");
  include ("../../junet/html/decrypt_password.inc.php");
  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $enrollment = $_POST['enrollment'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $DOB = $_POST['DOB'];
    $batch_year = $_POST['batch_year'];
    $stud_mobile = $_POST['stud_mobile'];
    $ward_mobile = $_POST['ward_mobile'];
    $stud_email = $_POST['stud_email'];
    $ward_email = $_POST['ward_email'];
    $dept_name = $_POST['dept_name'];
    $section = $_POST['section'];
    $pass = $_POST['password'];
    $en_pass = encrypt_password($pass);
    $mod_en_pass = str_replace("'","''",$en_pass);
    echo "<script>console.log('$enrollment');</script>";
    echo "<script>console.log('$first_name');</script>";
    echo "<script>console.log('$last_name');</script>";
    echo "<script>console.log('$DOB');</script>";
    echo "<script>console.log('$batch_year');</script>";
    echo "<script>console.log('$stud_mobile');</script>";
    echo "<script>console.log('$ward_mobile');</script>";
    echo "<script>console.log('$stud_email');</script>";
    echo "<script>console.log('$ward_email');</script>";
    
    $query = "insert into student_record values($enrollment,'$first_name','$last_name','$DOB',$batch_year,$stud_mobile,$ward_mobile,'$stud_email','$ward_email','$mod_en_pass')";
    
    mysqli_query($con,$query);
    
    $query = "insert into Batch_2021_25_student values($enrollment,'$dept_name','$section',0,0)";
    
    mysqli_query($con,$query);
    
  }
  
?>

<!DOCTYPE html>
<html>
<head>
<title>add student</title>
<link rel="stylesheet" href="studentstyle.css"></link>
</head>
<body>
  <div class="form">
  <div class="subtitle">Register a student</div>
    <form action="#" method="post">
    <div class="input-container ic2"> 
      <input type="text" name="enrollment" id="enroll" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="enrollment" class="placeholder">enrollment</label>
      </div>
      
      <div class="input-container ic2"> 
      <input type="text" name="first_name" id="fname" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="first_name" class="placeholder">First Name</label>
      </div>
      
      <div class="input-container ic2"> 
      <input type="text" name="last_name" id="lname" class="input" placeholder=" ">
      <div class="cut"></div>
      <label for="last_name" class="placeholder">Last Name</label>
      </div>
      
      <div class="input-container ic2"> 
      <input type="date" name="DOB" id="DOB" class="input" required>
      <div class="cut cut-short"></div>
      <label for="DOB" class="placeholder">DOB</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="batch_year" id="byear" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="batch_year" class="placeholder">Batch Year</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="stud_mobile" id="smobile" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="stud_mobile" class="placeholder">stud phone</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="ward_mobile" id="wmobile" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="ward_mobile" class="placeholder">ward phone</label>
      </div>
      
      <div class="input-container ic2">
      <input type="email" name="stud_email" id="smail" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="stud_email" class="placeholder">stud email</label>
      </div>
      
      <div class="input-container ic2">
      <input type="email" name="ward_email" id="wmail" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="ward_email" class="placeholder">ward email</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="dept_name" id="dept" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="dept_name" class="placeholder">Dept name</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="section" id="sect" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="section" class="placeholder">Section</label>
      </div>
      
      <div class="input-container ic2">
      <input type="password" name="password" id="pass" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="password" class="placeholder">password</label>
      </div>
      
      <input type="submit" name="submit" id="submit" class="submit">
    </form>
    </div>
  </div>
</body>
</html>