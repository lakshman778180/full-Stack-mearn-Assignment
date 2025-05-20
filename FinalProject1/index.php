<?php
session_start();
// Example: Set session when user logs in (you likely do this in login logic):
// $_SESSION['user_logged_in'] = true;

// Example logout logic might use: unset($_SESSION['user_logged_in']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Retail & Wholesale Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <!-- <link rel="stylesheet" href="styles.css"> -->
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
    
    :root {
      --primary-color:rgb(76, 13, 148);
      --secondary-color:rgb(7, 5, 78);
      --accent-color: #D2691E;
      --text-color: #5D4037;
      --background-light: #FFF8DC;
      --background-medium: #F5DEB3;
      --shadow-color: rgba(139, 69, 19, 0.3);
      --hover-transition: all 0.4s ease;
    }
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      transition: var(--hover-transition);
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      color: var(--text-color);
      background-color: var(--background-light);
      background-image: linear-gradient(135deg, var(--background-light) 25%, var(--background-medium) 25%, var(--background-medium) 50%, var(--background-light) 50%, var(--background-light) 75%, var(--background-medium) 75%, var(--background-medium) 100%);
      background-size: 40px 40px;
      overflow-x: hidden;
    }
    
    header {
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: #fff;
      text-align: center;
      box-shadow: 0 4px 15px var(--shadow-color);
      position: sticky;
      top: 0;
      z-index: 1000;
      animation: fadeIn 1s ease-in-out;
    }
    
    .store-logo-container {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1em;
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: #fff;
    }
    
    .store-logo {
      width: 40px;
      height: 40px;
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }
    
    h1 {
      margin: 0 15px;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
      font-weight: 700;
      letter-spacing: 1px;
    }
    
    nav {
      background: var(--secondary-color);
      padding: 0.8em 2em;
      position: relative;
    }
    
    nav ul {
      list-style: none;
      display: flex;
      justify-content: left;
      gap: 1.5em;
      margin: 0;
      padding: 0;
    }
    
    nav ul li a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      position: relative;
      padding: 0.5em 0.2em;
    }
    
    nav ul li a::after {
      content: '';
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 0;
      height: 3px;
      background-color: #fff;
      transition: width 0.3s ease;
    }
    
    nav ul li a:hover::after {
      width: 100%;
    }
    
    nav ul li a:hover {
      color: #FFD700;
    }
    
    .nav-search {
      display: flex;
      align-items: center;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 25px;
      padding: 0.3em 0.8em;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .search-select {
      padding: 0.5em;
      border-radius: 20px;
      border: none;
      background-color: var(--background-light);
      color: var(--text-color);
      font-weight: 600;
      cursor: pointer;
      outline: none;
    }
    
    .search-input {
      padding: 0.5em 1em;
      border-radius: 20px;
      width: 150px;
      border: none;
      background-color: var(--background-light);
      color: var(--text-color);
      outline: none;
      margin: 0 5px;
    }
    
    .search-input:focus {
      box-shadow: 0 0 0 2px var(--accent-color);
    }
    
    .search-icon {
      border-radius: 50%;
      width: 35px;
      height: 35px;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      background-color: var(--accent-color);
      color: white;
      border: none;
      transition: transform 0.3s ease;
    }
    
    .search-icon:hover {
      transform: scale(1.1);
    }
    
    section {
      padding: 3em 2em;
      margin: 2em 0;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8);
      border-radius: 15px;
      box-shadow: 0 5px 15px var(--shadow-color);
      max-width: 1200px;
      margin-left: auto;
      margin-right: auto;
      position: relative;
      overflow: hidden;
    }
    
    section::before {
      content: '';
      position: absolute;
      top: -10px;
      left: -10px;
      right: -10px;
      height: 10px;
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      border-radius: 5px 5px 0 0;
    }
    
    section:hover::before {
      top: 0;
    }
    
    h2 {
      color: var(--primary-color);
      margin-bottom: 1.5em;
      position: relative;
      display: inline-block;
      font-weight: 700;
    }
    
    h2::after {
      content: '';
      position: absolute;
      width: 60%;
      height: 3px;
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      bottom: -10px;
      left: 20%;
    }
    
    h2 a {
      text-decoration: none;
      color: var(--primary-color);
    }
    
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2em;
      margin-top: 2em;
    }
    
    .product {
      padding: 1.5em;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .product::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, rgba(210, 105, 30, 0.2) 0%, rgba(139, 69, 19, 0.1) 100%);
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    
    .product:hover {
      transform: translateY(-10px) scale(1.02);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .product:hover::before {
      opacity: 1;
    }
    
    .product img {
      width: 100%;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.5s ease;
      object-fit: cover;
      height: 180px;
    }
    
    .product:hover img {
      transform: scale(1.05);
    }
    
    .product p {
      margin-top: 1em;
      font-weight: 600;
      color: var(--text-color);
    }
    
    .product a {
      text-decoration: none;
      color: var(--text-color);
    }
    
    footer {
      background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
      color: #fff;
      text-align: center;
      padding: 2em;
      margin-top: 3em;
      position: relative;
      box-shadow: 0 -5px 15px var(--shadow-color);
    }
    
    footer::before {
      content: '';
      position: absolute;
      top: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 50%;
      height: 30px;
      background: var(--primary-color);
      border-radius: 50% 50% 0 0;
    }
    
    footer a {
      text-decoration: none;
      color: #fff;
      font-size: 1rem;
      display: inline-block;
      margin: 0.5em;
      padding: 0.5em 1em;
      border-radius: 25px;
      background: rgba(255, 255, 255, 0.1);
      transition: all 0.3s ease;
    }
    
    footer a:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-3px);
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }
    
    #contact {
      font-family: 'Poppins', sans-serif;
      font-size: 1.8rem;
      margin-bottom: 1em;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .l1 {
      margin: 1.5em 0;
      line-height: 1.6;
    }
    
    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    @keyframes slideInLeft {
      from { transform: translateX(-50px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideInRight {
      from { transform: translateX(50px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes fadeInUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    .animate-fade-in {
      animation: fadeIn 1s ease forwards;
    }
    
    .animate-slide-left {
      animation: slideInLeft 0.8s ease forwards;
    }
    
    .animate-slide-right {
      animation: slideInRight 0.8s ease forwards;
    }
    
    .animate-fade-up {
      animation: fadeInUp 0.8s ease forwards;
    }
    
    /* Responsive Design */
    /* Mobile Devices (up to 599px) */
    @media (max-width: 599px) {
      nav ul {
        flex-direction: column;
        padding: 0;
        gap: 0.8em;
      }
      
      .product-grid {
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 1em;
      }
      
      .product {
        padding: 1em;
      }
      
      .product img {
        height: 140px;
      }
      
      footer {
        padding: 1.5em;
        font-size: 0.9rem;
      }
      
      h1 {
        font-size: 1.5rem;
      }
      
      .nav-search {
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 1em;
      }
      
      .search-input {
        width: 120px;
      }
    }
    
    /* Tablets (600px to 991px) */
    @media (min-width: 600px) and (max-width: 991px) {
      nav ul {
        flex-wrap: wrap;
        justify-content: center;
        gap: 1em;
      }
      
      .product-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      
      .product {
        font-size: 1rem;
      }
      
      footer {
        padding: 1.8em;
      }
    }
    
    /* Desktop / PC (992px and up) */
    @media (min-width: 992px) {
      nav ul {
        gap: 1.8em;
      }
      
      .product-grid {
        grid-template-columns: repeat(4, 1fr);
      }
      
      .product:hover {
        transform: translateY(-15px) scale(1.05);
      }
    }
    
    @media (max-width: 991px) {
      #hamburger {
        display: block !important;
        background: none;
        border: none;
        font-size: 1.8rem;
        color: white;
        cursor: pointer;
      }
      
      nav ul {
        display: none !important;
      }
      
      nav ul.show {
        display: flex !important;
        flex-direction: column;
        background-color: var(--secondary-color);
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 1em 0;
        z-index: 999;
        animation: fadeIn 0.3s ease forwards;
      }
    }
   </style>
</head>
<body>
  <header>
    <div class="store-logo-container">
      <h1 class="animate-fade-in">LAKSHMAN VEGITABLE SHOP</h1>
    </div>
  
    <nav>
      <button id="hamburger" style="display: none;">
        <i class="fa fa-bars"></i>
      </button>      
      <ul>
        <li><a href="#home" class="animate-fade-in"><i class="fa-solid fa-house"></i> Home</a></li>
        <li><a href="#products" class="animate-fade-in"><i class="fa-solid fa-box-open"></i> Products</a></li>
        <li><a href="cart1.php" class="animate-fade-in"><i class="fa-solid fa-cart-shopping"></i> Cart</a></li>
       <?php if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true): ?>
    <li><a href="logout.php" class="animate-fade-in"><i class="fa-solid fa-circle-user"></i> Sign Out</a></li>
<?php else: ?>
    <li><a href="login.php" class="animate-fade-in"><i class="fa-solid fa-circle-user"></i> Sign In</a></li>
<?php endif; ?>
        <li><a href="#about" class="animate-fade-in"><i class="fa-solid fa-circle-info"></i> About Us</a></li>
        <li><a href="#wholesale" class="animate-fade-in"><i class="fa-solid fa-truck"></i> Wholesale Inquiry</a></li>
        <li><a href="#contact" class="animate-fade-in"><i class="fa-solid fa-address-card"></i> Contact</a></li>
        <li><a href="#faq" class="animate-fade-in"><i class="fa-solid fa-question-circle"></i> FAQs</a></li>
        <li><a href="#offers" class="animate-fade-in"><i class="fa-solid fa-tag"></i> Offers</a></li>
      </ul>
  
      <div class="nav-search">
        <select class="search-select">
          <option>All</option>
          <option>Fresh Tomatoes</option>
          <option>Potatoes</option>
          <option>Onions</option>
          <option>Cucumber</option>
        </select>
      
        <input placeholder="Search Store..." class="search-input">
      
        <button class="search-icon" aria-label="Search">
          <i class="fa-solid fa-magnifying-glass"></i>    
        </button>        
      </div>
    </nav>
  </header>
  

  <section id="home" class="animate-fade-up">
    <h2 class="animate-slide-left">Welcome to Our Store</h2>
    <div class="banner-container">
      <img src="https://laxmanvegetable.netlify.app/vegetables.jpg? alt="image" width="100%" style="border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
    </div>
    <p class="animate-slide-right" style="margin-top: 2em; font-size: 1.2rem;">Offering premium products at retail & wholesale prices.</p>
  </section>

  <section id="products" class="animate-fade-up">
    <h2 class="animate-slide-left">Our Products</h2>
    <div class="product-grid">
      <div class="product home-care animate-fade-up" style="animation-delay: 0.1s;">
        <a href="tomato.php">
          <img src="https://media.istockphoto.com/id/140453734/photo/fresh-tomatoes.jpg?s=612x612&w=0&k=20&c=b6XySPuRKF6opBf0bexh9AhkWck-c7TaoJvRdVNBgT0=" alt="Product 1">
          <p>Fresh Tomatoes</p>
        </a>
      </div>      
      <div class="product biscuit animate-fade-up" style="animation-delay: 0.2s;">
        <a href="potato.php">
          <img src="https://media.istockphoto.com/id/157430678/photo/three-potatoes.jpg?s=612x612&w=0&k=20&c=qkMoEgcj8ZvYbzDYEJEhbQ57v-nmkHS7e88q8dv7TSA=" alt="Product 2">
          <p>Potatoes</p>
        </a>
      </div>
      <div class="product beverage animate-fade-up" style="animation-delay: 0.3s;">
        <a href="onion.php">
          <img src="https://media.istockphoto.com/id/499146870/photo/red-onions.jpg?s=612x612&w=0&k=20&c=OaZUynAtxIJyPaSgAsAGWwAbpTs_EfKF5zT_UvBDpbY=" alt="Product 3">
          <p>Onions</p>
        </a>
      </div>
      <div class="product misc-products animate-fade-up" style="animation-delay: 0.4s;">
        <a href="cucumber.php">
          <img src="https://images.pexels.com/photos/2329440/pexels-photo-2329440.jpeg" alt="Product 3">
          <p>Cucumber</p>
        </a>
      </div>
    </div>
  </section>

  <section id="about" class="animate-fade-up">
    <h2 class="animate-slide-left">About Us</h2>
    <p class="animate-slide-right">Providing quality goods to customers and bulk buyers.</p>
    <a href="About.html" class="animate-fade-in" style="display: inline-block; margin-top: 1.5em; padding: 0.8em 2em; background: linear-gradient(to right, var(--primary-color), var(--secondary-color)); color: white; text-decoration: none; border-radius: 30px; font-weight: 600; box-shadow: 0 5px 15px var(--shadow-color); transition: all 0.3s ease;">
      Learn More About Us
    </a>
  </section>

  <section id="wholesale" class="animate-fade-up">
    <h2 class="animate-slide-left">Wholesale Inquiry</h2>
    <p class="animate-slide-right">Contact us for bulk pricing and partnerships.</p>
    <div class="animate-fade-in" style="margin-top: 2em; padding: 1.5em; background-color: rgba(139, 69, 19, 0.1); border-radius: 10px;">
   <form id="wholesaleForm" style="max-width: 500px; margin: 0 auto; text-align: left;">
  <div style="margin-bottom: 1em;">
    <label for="business-name"  style="display: block; margin-bottom: 0.5em; font-weight: 600;">Business Name:</label>
    <input type="text" id="business-name" name="business_name" required style="width: 100%; padding: 0.8em; border-radius: 8px; border: 1px solid #ccc;">
  </div>
  <div style="margin-bottom: 1em;">
    <label for="contact-email" style="display: block; margin-bottom: 0.5em; font-weight: 600;">Email:</label>
    <input type="email" id="contact-email" name="contact_email" required style="width: 100%; padding: 0.8em; border-radius: 8px; border: 1px solid #ccc;">
  </div>
  <div style="margin-bottom: 1em;">
    <label for="inquiry" style="display: block; margin-bottom: 0.5em; font-weight: 600;">Inquiry:</label>
    <textarea id="inquiry" name="inquiry_text" rows="4" required style="width: 100%; padding: 0.8em; border-radius: 8px; border: 1px solid #ccc;"></textarea>
  </div>
  <button type="submit"  style="padding: 0.8em 2em; background: linear-gradient(to right, var(--primary-color), var(--secondary-color)); color: white; border: none; border-radius: 30px; cursor: pointer; font-weight: 600; box-shadow: 0 5px 15px var(--shadow-color); transition: all 0.3s ease;">Submit Inquiry</button>
</form>

<!-- Optional success message -->
<div id="success-message" style="display: none; color: green; margin-top: 1em;">Inquiry submitted successfully!</div>


    </div>
  </section>

  <footer>
    <h2 id="contact">Contact Us</h2>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1em; margin: 1.5em 0;">
      <a href="mailto:lk842569@gmail.com" class="animate-fade-in">
        <i class="fa-solid fa-envelope" style="margin-right: 0.5em;"></i> SEND EMAIL
      </a>
      <a href="tel:+917781804958" class="animate-fade-in" style="animation-delay: 0.1s;">
        <i class="fa-solid fa-phone" style="margin-right: 0.5em;"></i> CONTACT
      </a>
    </div>
    
    <div class="l1">
      <p style="margin-bottom: 1em;">Address:<br> charout sitamarhi-843319</p>
      <a href="https://maps.app.goo.gl/qQ6NYzBDyZAV2uMf8" class="map-link">
        <img src="download.jpeg" width="150px" height="80px" style="border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
      </a>
    </div>

    <p style="margin-top: 2em; padding-top: 1em; border-top: 1px solid rgba(255,255,255,0.2);">© 2025 Retail & Wholesale Hub. All rights reserved.</p>
  </footer>
  
  <script>
    // Hamburger menu functionality
    document.addEventListener('DOMContentLoaded', function() {
      const hamburger = document.getElementById('hamburger');
      const navUl = document.querySelector('nav ul');
      
      hamburger.addEventListener('click', function() {
        navUl.classList.toggle('show');
      });
      
      // Search functionality
      const searchInput = document.querySelector('.search-input');
      const searchButton = document.querySelector('.search-icon');
      
      searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
          searchButton.click();
        }
      });
      
      // Add intersection observer for animations
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = 'translateY(0)';
          }
        });
      }, {
        threshold: 0.1
      });
      
      // Observe all sections
      document.querySelectorAll('section').forEach(section => {
        section.style.opacity = 0;
        section.style.transform = 'translateY(20px)';
        observer.observe(section);
      });
      
      // Observe all products
      document.querySelectorAll('.product').forEach(product => {
        product.style.opacity = 0;
        product.style.transform = 'translateY(20px)';
        observer.observe(product);
      });
    });
  </script>
      <script src="scripts.js"></script>
</body>
</html>