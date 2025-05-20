<?php
$servername = "localhost";
$username = "root";
$password = ""; // Update if needed
$dbname = "product";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get data from AJAX
$keyword = $_POST['keyword'] ?? '';
$category = $_POST['category'] ?? '';

if (!empty($keyword)) {
  // Save to search history
  $stmt = $conn->prepare("INSERT INTO search_history (keyword, category) VALUES (?, ?)");
  $stmt->bind_param("ss", $keyword, $category);
  $stmt->execute();
  $stmt->close();
}

// Fetch last 10 searches (optional – use for debugging or display in developer tools)
$sql = "SELECT keyword, category, timestamp FROM search_history ORDER BY timestamp DESC LIMIT 10";
$result = $conn->query($sql);

$history = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $history[] = $row;
  }
}

// Return as JSON (optional – frontend isn’t using this now, but could later)
header('Content-Type: application/json');
echo json_encode($history);

$conn->close();
?>
