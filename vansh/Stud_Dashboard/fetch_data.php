<?php
    include("db.php"); 
    include("../../junet/html/encrypt_password.inc.php");
    include ("../../junet/html/hash_gen.inc.php");
    include ("../../junet/html/decrypt_password.inc.php");

    // Check if the connection is successful
    if ($con === false) {
        echo "Connection failed"; // Display message if connection fails
    } else {
        // Check if enrollment number is provided in the GET request
        //if (isset($_GET['enrollment_no'])) {
           // $enrollment_no = $_GET['enrollment_no']; // Get enrollment number from GET request
            // Prepare the SQL SELECT query
            $enrollment_no="14320802721";//to be commented out. for testing.
        
            $sem1_query = "SELECT enrollment_no,course_id,curr_attendance,total_session FROM sem_1_crs_attend_recd where enrollment_no = $enrollment_no";
            // Execute the query
            $result = mysqli_query($con, $sem1_query);
            
            // Check if any records were returned
            if (mysqli_num_rows($result) > 0) {
                // Output table header with CSS styles
                echo "<table border='1' style='margin: 0 auto; text-align: center;'>";
                echo "<tr><th colspan='5'>Attendance for: $enrollment_no</th></tr>";
                echo "<tr><th>Course ID</th><th>Current Attendance</th><th>Total Sessions</th><th>Progress</th></tr>";
                
                echo "<h2>Subject-wise Attendance</h2>";
                //Attendance Trends & Attendance Alerts
                // Loop through each row of the result set
                while ($row = mysqli_fetch_assoc($result)) {
                    // Calculate progress ratio
                    $progress_ratio = ($row['curr_attendance'] / $row['total_session']) * 100;
            
                    // Output table row
                    echo "<tr>";
                    echo "<td>" . $row['course_id'] . "</td>";
                    echo "<td>" . $row['curr_attendance'] . "</td>";
                    echo "<td>" . $row['total_session'] . "</td>";
                    // Output progress bar with padding
                    echo "<td style='padding: 5px;'><progress value='$progress_ratio' max='100'></progress></td>";
                    echo "</tr>";
                }
                echo "</table>"; 
            } else {
                // No records found
                echo "No records found";
            }
            

            // Free result set
            mysqli_free_result($result);
        /*} else {
            echo "Enrollment number not provided"; // Output message if enrollment number is not provided in the GET request
        }*/

        // Close connection
        mysqli_close($con);
    }
?>
