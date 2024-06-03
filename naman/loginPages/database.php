<?php
    $servername = "localhost";
    $username = "usr";
    $password = "admin@1224";
    $database = "main_bpitattendance_db";
    $con = mysqli_connect($servername, $username, $password, $database);

    if(!$con){
        die("error detected".mysqli_error($con));
    }
    else{
        echo "connection established";
    }
?>