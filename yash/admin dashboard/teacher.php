<?php
  session_start();
  
  include("db.php");
  include("../../junet/html/encrypt_password.inc.php");
  include ("../../junet/html/hash_gen.inc.php");
  include ("../../junet/html/decrypt_password.inc.php");

  
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $teach_id = $_POST['teach_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $Dept_no = $_POST['Dept_no'];
    $teach_email = $_POST['teach_email'];
    $designation = $_POST['designation'];
    $pass = $_POST['password'];
    $en_pass = encrypt_password($pass);
    $mod_en_pass = str_replace("'","''",$en_pass);

    echo "<script>console.log('$teach_id');</script>";
    echo "<script>console.log('$first_name');</script>";
    echo "<script>console.log('$last_name');</script>";
    echo "<script>console.log('$Dept_no');</script>";
    echo "<script>console.log('$teach_email');</script>";
    echo "<script>console.log('$designation');</script>";
    echo "<script>console.log('$pass');</script>";
    echo "<script>console.log(`$en_pass`);</script>";
    
        
    
    $query = "insert into teacher_record values($teach_id,'$first_name','$last_name',$Dept_no,'$teach_email','$designation','$mod_en_pass')";
    
    mysqli_query($con,$query);
    
  }
  
?>

<!DOCTYPE html>
<html>
<head>
<title>add teacher</title>
<link rel="stylesheet" href="teacherstyle.css"></link>
</head>
<body>
  <div class="form">
  <div class="subtitle">Register a teacher</div>
    <form action="#" method="post">
      <div class="input-container ic2">
      <input type="text" name="teach_id" id="teach_id" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="teach_id" class="placeholder">Teacher id</label>
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
      <input type="text" name="Dept_no" id="Dept_no" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="Dept_no" class="placeholder">Dept num</label>
      </div>
      
      <div class="input-container ic2">
      <input type="email" name="teach_email" id="tmail" class="input" placeholder=" " required>
      <div class="cut cut-short"></div>
      <label for="teach_email" class="placeholder">email</label>
      </div>
      
      <div class="input-container ic2">
      <input type="text" name="designation" id="desgn" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="designation" class="placeholder">Designation</label>
      </div>
      
      <div class="input-container ic2">
      <input type="password" name="password" id="pass" class="input" placeholder=" " required>
      <div class="cut"></div>
      <label for="password" class="placeholder">Password</label>
      </div>
      <input type="submit" name="submit" id="submit" class="submit">
    </form>
  </div>
</body>
</html>