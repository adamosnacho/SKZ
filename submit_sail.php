<?php
include 'db_config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        $photo = $target_file;
    } else {
        die("Sorry, there was an error uploading your file.");
    }

    $sql = "INSERT INTO sails (brand, size, price, description, photo, contact)
    VALUES ('$brand', '$size', '$price', '$description', '$photo', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "New sail posted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
