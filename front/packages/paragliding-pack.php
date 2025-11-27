<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paragliding Package - Happy Valley Rinjani</title>
    <link rel="stylesheet" href="style.css">
    <style>
    </style>
</head>
<body>

    <div class="navbar">
        <nav>
            <img src="img/FULLLOGO.png" alt="Happy Valley Rinjani">
            <div class="bar">
                <li>
                    <a href="index.php">Homepage</a>
                    <a href="mount.php">Mt Rinjani</a>
                    <a href="hills.php">Hills</a>
                    <a href="paragliding.php">Paragliding</a>
                    <a href="about.php">About Us</a>
                    <a href="#help">Help</a>
                    <div class="dropdown">
                        <button class="dropbtn">Package
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="mount-pack.php">Mount Package</a>
                            <a href="hills-pack.php">Hills Package</a>
                            <a href="paragliding-pack.php">Paragliding Package</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Photography
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="wild-photo.php">Wildlife Photography</a>
                            <a href="human-photo.php">Human Interest Photography</a>
                        </div>
                    </div>
                </li>
            </div>
        </nav>
    </div>


    <section class="about1">
        <div class="about-me1">
            <h1>Paragliding Package</h1>
        </div>
        <p>Soar through the skies and experience breathtaking aerial views with our paragliding adventures. Feel the thrill of flying over stunning landscapes.</p>
    </section>

    <section>
        <div class="wrap">
            <h1>Paragliding Adventures</h1>
            <div class="grid" id="cards">

            </div>
        </div>
    </section>


    <section class="footer">

    </section>

    <script>
        // Icon functions
        function clockIcon(){
            return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="9" stroke="#1f6b78" stroke-width="2"/><path d="M12 7v6l4 2" stroke="#1f6b78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
        }
        
        function routeIcon(){
            return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 7a3 3 0 1 1-3-3 3 3 0 0 1 3 3Zm16 13a3 3 0 1 1-3-3 3 3 0 0 1 3 3Z" stroke="#1f6b78" stroke-width="2"/><path d="M4 7h7a5 5 0 0 1 5 5v3h4" stroke="#1f6b78" stroke-width="2" stroke-linecap="round"/></svg>'
        }
        
        function alertIcon(){
            return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0Z" stroke="#1f6b78" stroke-width="2"/><path d="M12 9v5M12 18h.01" stroke="#1f6b78" stroke-width="2" stroke-linecap="round"/></svg>'
        }
        
        function childIcon(){
            return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="6" r="3" stroke="#1f6b78" stroke-width="2"/><path d="M6 22v-4a6 6 0 0 1 12 0v4" stroke="#1f6b78" stroke-width="2" stroke-linecap="round"/></svg>'
        }

        function flightIcon(){
            return '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" stroke="#1f6b78" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>'
        }

   
        document.addEventListener('DOMContentLoaded', function() {
            loadParaglidingPackages();
        });

        function loadParaglidingPackages() {
            fetch('get_paragliding_packages.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(packages => {
                    const list = document.getElementById('cards');
                    list.innerHTML = ''; 
                    if (packages.length === 0) {
                        list.innerHTML = '<div class="no-packages" style="text-align: center; padding: 40px; color: #666;"><p>No paragliding packages available at the moment.</p></div>';
                        return;
                    }
                    
                    packages.forEach(package => {
                        list.appendChild(renderCard(package));
                    });
                })
                .catch(error => {
                    console.error('Error loading packages:', error);
                    document.getElementById('cards').innerHTML = 
                        '<div class="error" style="text-align: center; padding: 40px; color: #dc3545;"><p>Failed to load packages. Please try again later.</p></div>';
                });
        }

        function renderCard(packageData) {
            const card = document.createElement('article');
            card.className = 'card';
            card.setAttribute('role', 'region');
            card.setAttribute('aria-label', 'Tour card');
            
            const priceValue = packageData.price.replace('$', '');
            
            card.innerHTML = `
                <div class="media">
                    <img src="${packageData.image}" alt="${packageData.title}" loading="lazy">
                </div>
                <div class="body">
                    <div class="head">
                        <div class="head-text">
                            <div class="subtitle">${packageData.duration}</div>
                            <h2 class="title">${packageData.title}</h2>
                        </div>
                        <div class="price">
                            <span class="cur">$</span>
                            <span>${priceValue}</span>
                        </div>
                    </div>
                    <p class="desc">${packageData.description}</p>
                    <div class="info-grid">
                        <div class="pill">
                            <span class="pill-icon" aria-hidden="true">${clockIcon()}</span>
                            <div>
                                <div class="pill-label">Duration</div>
                                <div class="pill-value">${packageData.duration}</div>
                            </div>
                        </div>
                        <div class="pill">
                            <span class="pill-icon" aria-hidden="true">${flightIcon()}</span>
                            <div>
                                <div class="pill-label">Flight Type</div>
                                <div class="pill-value">Tandem Flight</div>
                            </div>
                        </div>
                        <div class="pill">
                            <span class="pill-icon" aria-hidden="true">${alertIcon()}</span>
                            <div>
                                <div class="pill-label">Difficulty</div>
                                <div class="pill-value">${packageData.difficulty}</div>
                            </div>
                        </div>
                        <div class="pill">
                            <span class="pill-icon" aria-hidden="true">${childIcon()}</span>
                            <div>
                                <div class="pill-label">Minimum Age</div>
                                <div class="pill-value">${packageData.min_age}</div>
                            </div>
                        </div>
                    </div>
                    <button class="cta" type="button" onclick="bookPackage(${packageData.id})">BOOK NOW</button>
                </div>
            `;
            
            return card;
        }

        function bookPackage(packageId) {
            alert(`Booking paragliding package ID: ${packageId}\nThis would redirect to booking page.`);
        }
    </script>
</body>
</html>