document.addEventListener("DOMContentLoaded", function () {
  // Attach event listeners properly
  document.querySelector(".search-icon").addEventListener("click", function () {
      searchProducts();
  });

  document.querySelector(".search-input").addEventListener("keyup", function (event) {
      if (event.key === "Enter") {
          searchProducts();
      }
  });

  function searchProducts() {
      let query = document.querySelector(".search-input").value.toLowerCase();
      let products = document.querySelectorAll(".product");
      let found = false; // Track if a match is found

      products.forEach(product => {
          let productNameElement = product.querySelector("p:first-of-type"); // Select first paragraph
          if (productNameElement) {
              let productName = productNameElement.textContent.toLowerCase();
              if (productName.includes(query)) {
                  product.style.display = "block"; // Show matching product
                  if (!found) {
                      product.scrollIntoView({ behavior: "smooth", block: "center" }); // Scroll to first match
                      found = true;
                  }
              } else {
                  product.style.display = "none"; // Hide non-matching product
              }
          }
      });

      // If no matches are found, display a message
      if (!found) {
          alert("No matching products found!");
      }
  }
});


function addToCart(productId, productName, price) {
    fetch('cart.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ productId, productName, price, quantity: 1 })
    }).then(response => response.text())
      .then(data => alert(data));
}


document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.querySelector('.search-input');
    const searchButton = document.querySelector('.search-icon');
    const categorySelect = document.querySelector('.search-select');
  
    function sendSearchData(keyword, category) {
      fetch('store_search.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `keyword=${encodeURIComponent(keyword)}&category=${encodeURIComponent(category)}`
      });
    }
  
    // Trigger on button click
    searchButton.addEventListener('click', function () {
      const keyword = searchInput.value.trim();
      const category = '';
      if (keyword !== '') {
        sendSearchData(keyword, category);
      }
    });
  
    // Trigger on Enter key
    searchInput.addEventListener('keydown', function (event) {
      if (event.key === 'Enter') {
        event.preventDefault(); // prevent default form submission
        searchButton.click(); // simulate button click
      }
    });
  });


document.getElementById('wholesaleForm').addEventListener('submit', function(e) {
  e.preventDefault(); // Stop normal form submission

  const formData = new FormData(this);

  fetch('wholesale_submit.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Optionally show a success message
    document.getElementById('success-message').style.display = 'block';
    // Optionally reset form
    document.getElementById('wholesaleForm').reset();
  })
  .catch(error => {
    alert("Something went wrong: " + error);
  });
});

  
  // document.addEventListener('DOMContentLoaded', function () {
  //   const hamburger = document.getElementById('hamburger');
  //   const navMenu = document.querySelector('nav ul');
  
  //   hamburger.addEventListener('click', function () {
  //     navMenu.classList.toggle('show');
  //   });
  // });
  
 
// function search() {
//     let input = document.querySelector('.search-input').value.toLowerCase();
//     let products = document.querySelectorAll('.product');

//     products.forEach(product => {
//         let name = product.querySelectorAll('p')[0].innerText.toLowerCase(); // Get the product name
//         if (name.includes(input)) {
//             product.style.display = "block";
//         } else {
//             product.style.display = "none";
//         }
//     });
// }


