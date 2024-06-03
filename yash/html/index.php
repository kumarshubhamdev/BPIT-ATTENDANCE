<!DOCTYPE html>
<html>
<head>
  <title>location</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <?php

if(isset($_POST['username'])){
  $username = $_POST['username'];
  
  echo "<h2>hello $username </h2>";
}

?>

<h1>HTML Geolocation</h1>
<p>Click the button to get your coordinates.</p>


<input type="checkbox" id="button" class="hidden"/>
<label for="button" class="button disabled">Finish<img src="https://100dayscss.com/codepen/checkmark-green.svg"/></label>
  <svg class="circle">
    <circle cx="30" cy="30" r="29"/>
  </svg>

<p id="demo"></p>


<form action="qr.php" method="post">
  Latitude: <input type="text" name="latitude" id="lat"><br>
  Longitude: <input type="text" name="longitude" id="long"><br>
  <input type="submit" value="Attend" id="submitbtn">
</form>
</div>
<script src="script.js"></script>

</body>
</html>


