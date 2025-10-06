<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "ictd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch properties from the database
$sql = "SELECT title, description, image, address, city, property_option FROM properties";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Property Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .property-listings {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .property {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .property img {
            max-width: 100%;
            border-radius: 5px;
        }

        .property h2 {
            color: #333;
            font-size: 1.2em;
            margin-top: 0;
        }

        .property p {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Property Listings</h1>

    <div class="property-listings">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $imageData = base64_encode($row["image"]);
            $imageSrc = 'data:image/jpeg;base64,' . $imageData;

            echo "<div class='property'>";
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<img src='" . $imageSrc . "'>";
            echo "<h2>" . $row["address"] . "</h2>";
            echo "<h2>" . $row["city"] . "</h2>";
            echo "<h2>" . $row["property_option"] . "</h2>";
            echo "</div>";
        }
    } else {
        echo "<p>No properties found.</p>";
    }

    $conn->close();
    ?>
    </div>
</body>
</html>
