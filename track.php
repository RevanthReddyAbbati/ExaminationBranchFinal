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

// Escape user input for security
$hallticket = $conn->real_escape_string($_GET['hallticket']);

// Fetch student name from the database
$nameQuery = "SELECT name FROM application_status WHERE hallticket = '$hallticket'";
$nameResult = $conn->query($nameQuery);

if ($nameResult && $nameResult->num_rows > 0) {
    $row = $nameResult->fetch_assoc();
    $name = $row['name'];

    // Fetch status from the database
    $sql = "SELECT status, certificate_number, Postal_Tracking, Remarks FROM application_status WHERE hallticket = '$hallticket'";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            // Output status based on fetched data
            while ($row = $result->fetch_assoc()) {
                switch ($row['status']) {
                    case 1:
                        echo "<p>Hello $name, your Application status is Pending for Payment Verification. <br> Estimated Time: 25 to 30 Days</p>";
                        break;
                    case 2:
                        echo "<p>Hello $name, your Application status is Pending As TR is Not Available. <br> Estimated Time: 20 to 25 Days</p>";
                        break;
                    case 3:
                        echo "<p>Hello $name, the Certificate Status is Pending for Signature. <br> Estimated Time: 10 to 20 Days</p>";
                        break;
                    case 4:
                        echo "<p>Hello $name, your Certificate was Ready and Your Certificate Number is: <span style='color: green;'>" . $row['certificate_number'] . "</span><br> Estimated Time: 5 to 10 Days</p>";
                        break;
                    case 5:
                        echo "<p>Hello $name, your Certificate was Ready and Posted To Your Address"; 
                        echo "<br>";
                        echo "Your Certificate Number is: <span style='color: green;'>" . $row['certificate_number'] . "</span><br>";
                        echo "Your Tracking Number is: <span style='color: green;'>" . $row['Postal_Tracking'] . "</span><br>";
                        echo "You can track the status using the link";
                        
                        echo "<div class=\"tracking-link\"><a href=\"https://www.indiapost.gov.in/_layouts/15/dop.portal.tracking/trackconsignment.aspx\">Certificate Post Tracking Link</a></div>";
                        break;
                    case 6:
                        echo "<p>Hello $name, Remarks: " . $row['Remarks'] . "</p>";
                        break;
                    default:
                        echo "<p>Hello $name, Invalid status</p>";
                }
            }
        } else {
            echo "<p>Hello $name, No records found</p>";
        }
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
} else {
    echo "<p>No student found with the provided hall ticket number</p>";
}

// Close connection
$conn->close();
?>
