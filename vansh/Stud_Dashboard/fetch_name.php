<?php
include("db.php"); 

// Check if the connection is successful
if ($con === false) {
    echo "Connection failed"; // Display message if connection fails
} else {
    // Check if enrollment number is provided in the GET request
    //if (isset($_GET['enrollment_no'])) {
      //  $enrollment_no = $_GET['enrollment_no']; // Get enrollment number from GET request
        
        $enrollment_no="14320802721";//to be commented out. for testing.
        // Prepare the SQL SELECT query
        $name_query = "SELECT stud_first_name FROM student_record WHERE enrollment_no = $enrollment_no";
        $name_result = mysqli_query($con, $name_query);

        if ($name_result) {
            if (mysqli_num_rows($name_result) > 0) {
                // Student found, fetch and display the name
                $name_row = mysqli_fetch_assoc($name_result);
                $student_name = $name_row['stud_first_name'];
            } else {
                echo "No student found with the given enrollment number.";
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } /*else {
        echo "Enrollment number not provided.";
    }*/

    // Close connection
    mysqli_close($con);
//}
?>
