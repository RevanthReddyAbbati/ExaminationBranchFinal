<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 10px;
        }
        .details {
            margin-bottom: 2px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px; /* Add margin to counteract padding on columns */
        }
        .column {
            flex: 0 0 50%;
            padding: 10px;
        }
    </style>
</head>
<body>
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

    // Fetch details from the database
    $sql = "SELECT a.*, s.Phone, s.Address FROM application_status a JOIN student_data s ON a.hallticket = s.hallticket";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class='row'>";
        // Output data of each row
        $count = 0;
        while($row = $result->fetch_assoc()) {
            if ($count % 2 == 0) {
                echo "</div><div class='row'>";
            }
            echo "<div class='column'>";
            echo "<div class='details'>";
            echo "Name: " . $row["name"] . "<br>";
            echo "Hallticket: " . $row["hallticket"] . "<br>";
            echo "Phone: " . $row["Phone"] . "<br>"; 
            echo "Address: " . $row["Address"] . "<br>"; 
            echo "Certificate Number: " . $row["certificate_number"] . "<br>";
            echo "Postal Tracking: " . $row["Postal_Tracking"] . "<br>";
            echo "Remarks: " . $row["Remarks"] . "<br>";
            echo "</div>";
            echo "</div>";
            $count++;
        }
        echo "</div>";
    } else {
        echo "No records found";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
