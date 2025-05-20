<?php
$conn = new mysqli("localhost", "root", "", "product");
$result = $conn->query("SELECT * FROM cart");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: bisque;
        padding: 30px;
    }
    table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background-color: bisque;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    th, td {
        padding: 14px 20px;
        text-align: center;
        border-bottom: 1px solid gray;
    }
    th {
        background-color: gray;
        color: white;
        font-size: 16px;
    }
    td a {
        text-decoration: none;
        background-color: #dc3545;
        color: white;
        padding: 6px 12px;
        border-radius: 4px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    td a:hover {
        background-color: #c82333;
    }
    tr:hover {
        background-color: wheat;
    }
</style>
</style>
</head>
<body>
    <?php
    echo "<table border='1'>";
echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['product_name']}</td><td>{$row['price']}</td><td>{$row['quantity']}</td><td><a href='remove_cart.php?id={$row['id']}'>Remove</a></td></tr>";
}
echo "</table>";
?>
</body>
</html>

