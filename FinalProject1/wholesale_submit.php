<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "product";

// Connect to DB
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data
$business_name = $_POST['business_name'];
$contact_email = $_POST['contact_email'];
$inquiry_text = $_POST['inquiry_text'];

// Insert query
$sql = "INSERT INTO wholesale_inquiries (business_name, contact_email, inquiry_text) 
        VALUES (?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $business_name, $contact_email, $inquiry_text);
$stmt->execute();

$stmt->close();
$conn->close();
?>
