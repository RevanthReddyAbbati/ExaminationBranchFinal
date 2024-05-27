<?php
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $hallticket = $conn->real_escape_string($_POST['hallticket']);

    // Query to fetch status and certificate number from database
    $sql = "SELECT status, certificate_number FROM application_status WHERE hallticket='$hallticket'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $status = $row['status'];
        $certificateNumber = $row['certificate_number'];
        
        // Check if status is 4 (Certificate Ready) and certificate number is present
        if ($status == 4 && !empty($certificateNumber)) {
            // Return status and certificate number as JSON response
            echo json_encode(array("status" => "Certificate Ready", "certificateNumber" => $certificateNumber));
        } else {
            // Return only status as JSON response
            echo json_encode(array("status" => $status));
        }
    } else {
        // Return error message if status not found
        echo json_encode(array("error" => "Status not found"));
    }
}

// Close connection
$conn->close();
?>
