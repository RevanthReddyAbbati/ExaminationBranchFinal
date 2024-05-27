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
    $courseType = $conn->real_escape_string($_POST['select1']);
    $course = $conn->real_escape_string($_POST['select2']);
    $hallTicketNumber = $conn->real_escape_string($_POST['hallticket']);
    $name = $conn->real_escape_string($_POST['name']);
    $month = $conn->real_escape_string($_POST['month']);
    $year = $conn->real_escape_string($_POST['year']);
    $Phone = $conn->real_escape_string($_POST['Phone']);
    $Address = $conn->real_escape_string($_POST['Address']);

    // Check if the hall ticket number already exists in the database
    $check_query = "SELECT * FROM student_data WHERE hallticket='$hallTicketNumber'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo '<script>alert("User details already exist in the database")</script>';
    } else {
        // Insert data into database
        $sql = "INSERT INTO student_data (course_type, course, hallticket, name, month, year, Phone, Address) 
            VALUES ('$courseType', '$course', '$hallTicketNumber', '$name', '$month', '$year', '$Phone', '$Address')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Submitted Successfully")</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
