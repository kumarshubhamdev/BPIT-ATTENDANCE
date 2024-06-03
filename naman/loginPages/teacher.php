<?php
    include ("database.php");
    include("../../junet/html/encrypt_password.inc.php");
    include ("../../junet/html/hash_gen.inc.php");
    include ("../../junet/html/decrypt_password.inc.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $teacherid = $_POST['teacherid'];
        $password = $_POST['pass'];

            $command = "select * from teacher_record where teacher_id = $teacherid";

            $result = mysqli_query($con, $command);
            
              if($result){
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    $fetched_pass = $user_data['password'];
                    $decrypt_pass = decrypt_password(strlen($password),$fetched_pass);
                    if($decrypt_pass == $password){
                        echo "<script>console.log('logged in')</script>";
                    }
                }
              }
            else{
                echo "<script> Not able to login </script>";
            }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="studentLogin1.css">
</head>
<body>
    <div id="bg"></div>
    <div id="form">
        <form method = "POST" id="container">
            <label for="username">Teacher's ID</label>
            <input type="text" placeholder="Enter Username" name="enrollmentNo" required>
            <br><br>
            <label for="pass">Password</label>
            <input type="text" placeholder="Enter Password" name="pass" required>
            <br><br>
            <button class="btn" type="submit">Submit</button><br>
    </div>
</body>
</html>