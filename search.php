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

// Check if hallticket is provided
if (isset($_GET["hallticket"])) {
    // Escape hallticket input for security
    $hallticket = $conn->real_escape_string($_GET["hallticket"]);

    // Query to fetch student details by hallticket number
    $sql = "SELECT hallticket, name FROM student_data WHERE hallticket LIKE '$hallticket%'";

    $result = $conn->query($sql);

    $hallticketList = array();

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $hallticketList[] = array("hallticket" => $row["hallticket"], "name" => $row["name"]);
        }
    }

    echo json_encode($hallticketList);
}

// Close connection
$conn->close();
?>
