<?php
$servername = "localhost";
$username = "usr";
$password = "admin@1224";
$dbname = "main_bpitattendance_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchType = $_GET['search_type'];
$searchText = $_GET['search_text'];

if ($searchType === "course") {
    $sql = "SELECT stud_first_name, stud_last_name, date_of_birth, batch_year FROM student_record";
} else {
    $sql = "SELECT stud_first_name, stud_last_name, date_of_birth, batch_year FROM student_record WHERE enrollment_no = '$searchText'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($searchType === "course") {
        echo "<table><tr><th>Student Name</th><th>Date of Birth</th><th>Batch Year</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["stud_first_name"] . " " . $row["stud_last_name"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["batch_year"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        $row = $result->fetch_assoc();
        echo "<table><tr><th>Student Name</th><th>Date of Birth</th><th>Batch Year</th></tr>";
        echo "<tr><td>" . $row["stud_first_name"] . " " . $row["stud_last_name"] . "</td><td>" . $row["date_of_birth"] . "</td><td>" . $row["batch_year"] . "</td></tr>";
        echo "</table>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
