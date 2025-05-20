<?php
$conn = new mysqli("localhost", "root", "", "product");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $stmt = $conn->prepare("INSERT INTO cart (product_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isdi", $data['productId'], $data['productName'], $data['price'], $data['quantity']);
    $stmt->execute();
    echo "Item added to cart!";
}
?>