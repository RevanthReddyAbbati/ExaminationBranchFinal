<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $host = "localhost"; // Change this to your database server name
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "examination_branch"; // Change this to your database name

    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $hallticket = $conn->real_escape_string($_POST['hallticket']);
    $name = $conn->real_escape_string($_POST['name']);
    $status = $conn->real_escape_string($_POST['status']);
    $certificate_number = $conn->real_escape_string($_POST['certificate_number']);
    $post_number = $conn->real_escape_string($_POST['post_number']);
    $remarks = ''; // Initialize remarks variable

    // Check if status is 'Others' and update remarks accordingly
    if ($status === '6') {
        $remarks = $conn->real_escape_string($_POST['others']);
    }

    // Check if there's an existing record for the hallticket
    $check_query = "SELECT * FROM application_status WHERE hallticket='$hallticket'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        // If there's an existing record, update the status and remarks
        $update_query = "UPDATE application_status 
                         SET status='$status', certificate_number='$certificate_number', Postal_Tracking='$post_number',
                             Remarks=CASE WHEN '$status' = '6' THEN '$remarks' ELSE NULL END
                         WHERE hallticket='$hallticket'";
        
        if ($conn->query($update_query) === TRUE) {
            echo '<script>alert("Status updated successfully");</script>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // If there's no existing record, insert a new one
        $insert_query = "INSERT INTO application_status (hallticket, name, status, certificate_number, Postal_Tracking, Remarks) 
                         VALUES ('$hallticket', '$name', '$status', '$certificate_number', '$post_number', '$remarks')";
        
        if ($conn->query($insert_query) === TRUE) {
            echo '<script>alert("Status updated successfully");</script>';
        } else {
            echo "Error inserting record: " . $conn->error;
        }
    }

    // Close connection
    $conn->close();
}
?>
