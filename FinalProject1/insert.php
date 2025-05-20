<?php
include 'config.php';

$tomato = [
    ['Tomato', '20 to 40 Rupees/kg', 'vegetable image/tomato.jpg'],
    ['Potato', '15 to 30 Rupees/kg', 'vegetable image/potato.jpg'],
    ['Onion', '20 to 35 Rupees/kg', 'vegetable image/onion.jpg'],
    ['Carrot', '30 to 50 Rupees/kg', 'vegetable image/carrot.jpg'],
    ['Cabbage', '20 to 40 Rupees/pcs', 'vegetable image/cabbage.jpg'],
    ['Cauliflower', '25 to 45 Rupees/pcs', 'vegetable image/cauliflower.jpg'],
    ['Spinach', '10 to 25 Rupees/bundle', 'vegetable image/spinach.jpg'],
    ['Lady Finger', '30 to 50 Rupees/kg', 'vegetable image/ladyfinger.jpg'],
    ['Brinjal', '20 to 40 Rupees/kg', 'vegetable image/brinjal.jpg'],
    ['Bottle Gourd', '25 to 35 Rupees/pcs', 'vegetable image/bottlegourd.jpg'],
    ['Bitter Gourd', '30 to 45 Rupees/kg', 'vegetable image/bittergourd.jpg'],
    ['Pumpkin', '15 to 30 Rupees/kg', 'vegetable image/pumpkin.jpg'],
    ['Green Peas', '40 to 60 Rupees/kg', 'vegetable image/greenpeas.jpg'],
    ['Coriander', '5 to 15 Rupees/bundle', 'vegetable image/coriander.jpg'],
    ['Ginger', '60 to 100 Rupees/kg', 'vegetable image/ginger.jpg'],
    ['Garlic', '80 to 120 Rupees/kg', 'vegetable image/garlic.jpg'],
    ['Radish', '10 to 25 Rupees/pcs', 'vegetable image/radish.jpg'],
    ['Beetroot', '25 to 40 Rupees/kg', 'vegetable image/beetroot.jpg'],
    ['Capsicum', '30 to 60 Rupees/kg', 'vegetable image/capsicum.jpg'],
    ['Green Chili', '40 to 80 Rupees/kg', 'vegetable image/greenchili.jpg'],
];

foreach ($tomato as $product) {
    $sql = "INSERT INTO tomato (name, price, image_path) VALUES ('$product[0]', '$product[1]', '$product[2]')";
    if ($conn->query($sql) === TRUE) {
        echo "Product '$product[0]' added successfully!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


