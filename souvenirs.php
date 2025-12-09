<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=18">
    <style>
 h2.section-title {
      font-size: 1.6rem;
      font-weight: 700;
      margin-bottom: 16px;
      margin-left: 1rem;
    }

    .section {
      margin-bottom: 40px;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 18px;
    }

    .product-card {
      background-color: #ddf4e7;
      color: #1f3b4b;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 18px rgba(0,0,0,0.15);
      display: flex;
      flex-direction: column;
      position: relative;
      margin-left: 1rem;
    }

    .product-image-wrapper {
      position: relative;
      width: 100%;
      padding-top: 70%;
      overflow: hidden;
    }

    .product-image-wrapper img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .discount-badge {
      position: absolute;
      top: 8px;
      right: 8px;
      background-color: #ffb84d;
      color: #1f3b4b;
      font-size: 0.75rem;
      font-weight: 700;
      padding: 4px 8px;
      border-radius: 999px;
    }

    .product-content {
      padding: 12px 14px 16px;
      display: flex;
      flex-direction: column;
      gap: 6px;
      flex: 1;
    }

    .product-name {
      font-size: 0.9rem;
      font-weight: 600;
      line-height: 1.3;
    }

    .product-price {
      margin-top: 6px;
      padding: 6px 10px;
      background-color: #ffb84d;
      color: #1f3b4b;
      font-weight: 700;
      font-size: 0.9rem;
      border-radius: 10px;
      align-self: flex-start;
    }

    .buy-btn {
      margin-top: 10px;
      background-color: #1f3b4b;
      color: #ddf4e7;
      padding: 10px;
      font-size: 0.9rem;
      font-weight: 700;
      border-radius: 10px;
      text-align: center;
      text-decoration: none;
      transition: 0.25s;
    }

    .buy-btn:hover {
      background-color: #144a60;
      transform: translateY(-2px);
    }

    </style>
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <section id="about1" class="about1">
        <div class="about-me1">
            <h1>Mount Rinjani</h1>
        </div>
        <p>enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</p>
    </section>

    <section class="section">
        <h2 class="section-title">Sembalun Coffee</h2>
        <div class="product-grid" id="coffeeProducts">

        </div>
    </section>


    <section class="section">
        <h2 class="section-title">Others</h2>
        <div class="product-grid" id="otherProducts">

        </div>
    </section>
    <?php include 'includes/footer.php'; ?>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            loadProducts();
        });
        

        function loadProducts() {
            fetch('api/get_souvenirs.php')
                .then(response => response.json())
                .then(data => {
                    displayProducts(data);
                })
                .catch(error => {
                    console.error('Error loading products:', error);
                    displayProducts(getStaticProducts());
                });
        }
        
        function displayProducts(products) {
            const coffeeContainer = document.getElementById('coffeeProducts');
            const otherContainer = document.getElementById('otherProducts');
            
            coffeeContainer.innerHTML = '';
            otherContainer.innerHTML = '';
            
            const coffeeProducts = products.filter(item => item.category === 'Coffee');
            const otherProducts = products.filter(item => item.category === 'Other');
            
            if (coffeeProducts.length > 0) {
                coffeeProducts.forEach(product => {
                    coffeeContainer.appendChild(createProductCard(product));
                });
            } else {
                coffeeContainer.innerHTML = '<div class="no-products"><i class="fas fa-coffee"></i><p>Belum ada produk coffee.</p></div>';
            }
            if (otherProducts.length > 0) {
                otherProducts.forEach(product => {
                    otherContainer.appendChild(createProductCard(product));
                });
            } else {
                otherContainer.innerHTML = '<div class="no-products"><i class="fas fa-gift"></i><p>Belum ada produk lainnya.</p></div>';
            }
        }
        function createProductCard(product) {
            const card = document.createElement('article');
            card.className = 'product-card';
            card.dataset.id = product.id;
            
            let discountBadge = '';
            if (product.discount > 0) {
                discountBadge = `<span class="discount-badge">-${product.discount}%</span>`;
            }
            
            card.innerHTML = `
                <div class="product-image-wrapper">
                    <img src="${product.image}" alt="${product.name}" onerror="this.src='https://via.placeholder.com/400x300?text=Souvenir+Rinjani'">
                    ${discountBadge}
                </div>
                <div class="product-content">
                    <div class="product-name">${product.name}</div>
                    <div class="product-price">${product.price}</div>
                    <a href="#" class="buy-btn">Buy Now</a>
                </div>
            `;
            
            return card;
        }
        function getStaticProducts() {
            return [
                {
                    id: 1,
                    name: "Beans Arabica Sembalun 1Kg.",
                    description: "Kopi Arabica asli dari perkebunan Sembalun, dikemas dalam kemasan 1 kilogram.",
                    category: "Coffee",
                    price: "Rp. 150.000",
                    discount: 5,
                    image: "https://via.placeholder.com/400x300?text=Beans+Arabica"
                },
                {
                    id: 2,
                    name: "Kopi Arabica Sembalun 100gr.",
                    description: "Kopi Arabica bubuk kemasan 100 gram, siap seduh.",
                    category: "Coffee",
                    price: "Rp. 40.000",
                    discount: 0,
                    image: "https://via.placeholder.com/400x300?text=Kopi+Arabica"
                },
                {
                    id: 3,
                    name: "Kopi Arabica Sembalun 250gr.",
                    description: "Kopi Arabica bubuk kemasan 250 gram, cocok untuk konsumsi pribadi.",
                    category: "Coffee",
                    price: "Rp. 80.000",
                    discount: 0,
                    image: "https://via.placeholder.com/400x300?text=Kopi+Arabica"
                },
                {
                    id: 4,
                    name: "Buncis Sembalun 500gr.",
                    description: "Buncis segar dari perkebunan Sembalun, dikemas dengan rapi.",
                    category: "Other",
                    price: "Rp. 50.000",
                    discount: 0,
                    image: "https://via.placeholder.com/400x300?text=Buncis"
                },
                {
                    id: 5,
                    name: "Strawberry Sembalun 1Kg.",
                    description: "Strawberry segar hasil panen dari kebun Sembalun.",
                    category: "Other",
                    price: "Rp. 45.000",
                    discount: 0,
                    image: "https://via.placeholder.com/400x300?text=Strawberry"
                },
                {
                    id: 6,
                    name: "Chili Sembalun 1Kg.",
                    description: "Cabai segar khas Sembalun dengan cita rasa pedas yang khas.",
                    category: "Other",
                    price: "Rp. 80.000",
                    discount: 0,
                    image: "https://via.placeholder.com/400x300?text=Chili"
                }
            ];
        }

        var navLinks = document.getElementById("navLinks");
        function showMenu() { navLinks.style.right = "0"; }
        function hideMenu() { navLinks.style.right = "-250px"; }
        
    </script>
</body>
</html>