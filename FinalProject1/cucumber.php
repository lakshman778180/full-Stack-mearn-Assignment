<?php
include 'config.php';

$sql = "SELECT * FROM cucumber"; // Ensure this table exists
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>vegetable</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      background-color: #f5f5f5;
      margin: 0;
      font-family: sans-serif;
    }
    .heading {
      text-align: center;
      font-size: 2em;
      font-weight: bold;
      color: #333;
      background-color: wheat;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(255, 0, 0, 0.5);
      width: 80%;
      max-width: 1000px;
      margin: 20px;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2em;
      padding: 20px;
      width: 90%;
      max-width: 1000px;
    }
    .product {
      padding: 15px;
      background-color: wheat;
      border-radius: 15px;
      border: 2px solid #c1c1c2;
      box-shadow: 0 4px 10px rgba(255, 0, 0, 0.5);
      text-align: center;
      transition: transform 0.3s;
    }
    .product img {
      width: 100%;
      border-radius: 5px;
      box-shadow: 0 4px 10px rgba(219, 26, 26, 0.5);
    }
    .product:hover {
      background-color: blanchedalmond;
      cursor: pointer;
      transform: scale(1.1);
    }
    .product button {
      margin-top: 10px;
      padding: 8px 12px;
      background-color: #ff7043;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="heading">
    Explore Our Best vegitable 
    <div style="margin-top: 15px;">
      <input type="text" class="search-input" placeholder="Search for a product..." onkeyup="search()" style="padding: 10px; width: 250px; border-radius: 5px; border: 1px solid #ccc;">
      <button class="search-icon" style="padding: 10px 15px; border: none; border-radius: 5px; background-color: tomato; color: white; cursor: pointer;">Search</button>
    </div>
  </div>

  <div class="product-grid">
    <?php if ($result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <?php
          $id = (int)$row['id'];
          $name = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
          $price = number_format((float)$row['price'], 2);
          $image = htmlspecialchars($row['image_path'], ENT_QUOTES, 'UTF-8');
        ?>
        <div class="product">
          <img src="<?= $image ?>" alt="<?= $name ?>" onerror="this.src='fallback.jpg'">
          <p><?= $name ?></p>
          <p>Price: <?= $price ?> Rupees</p>
          <button onclick='addToCart(<?= $id ?>, "<?= $name ?>", <?= $price ?>)'>Add to Cart</button>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No vegitables available.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
  </div>

  <script src="scripts.js"></script>
</body>
</html>
