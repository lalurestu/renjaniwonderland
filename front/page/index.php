<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Valley Rinjani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .text-colorh3{
        color: #DDF4E7;
        font-weight: 600;
        font-size: 49.45px;
    }
    .text-colorp{
        color: #DDF4E7;
        font-weight: 600;
        font-size: ;
    }
</style>
<body>

    <div class="navbar">
        <nav>
            <img src="img/FULLLOGO.png" alt="">
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
    

    <section id="about" class="about">
        <div class="about-me">
            <h1>Rinjani Wonder <span>Land</span></h1>
        </div>
        <h2>We are your trusted partner in exploring the beauty of Sembalun, Lombok. With a professional  team, we guide you to conquer the summit of Mount Rinjani, enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</h2>
    </section>
    

    <section id="rekomendasi" class="py-16 px-#26667F;">
        <div class="container mx-auto">
            <div class="text-start mb-12">
                <h3 class="text-colorh3">Rekomendasi Destinasi</h3>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="recommendationsContainer">
  
            </div>
            
            <button id="refreshButton" class="refresh-btn text-white px-6 py-3 rounded-full mt-8 font-semibold flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Lihat Rekomendasi Lain
            </button>
        </div>
    </section>


    <section class="py-20 px-6">
        <div class="container mx-auto">
            <div class="text-start mb-12">
                <h3 class="text-colorh3">Gallery</h3>
            </div>
            

            <div class="relative">
                <div class="relative overflow-hidden rounded-3xl shadow-2xl">
     
                    <div id="imageSlider" class="relative w-full h-[600px]">
                     
                        <div class="slide absolute inset-0 opacity-100 transition-opacity duration-500">
                            <img 
                                src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                                alt="Pemandangan gunung dan danau yang indah di Indonesia" 
                                class="w-full h-full object-cover"
                            />
                        </div>
                        
                 
                        <div class="slide absolute inset-0 opacity-0 transition-opacity duration-500">
                            <img 
                                src="https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                alt="Pantai tropis dengan air jernih di Indonesia" 
                                class="w-full h-full object-cover"
                            />
                        </div>
                        
              
                        <div class="slide absolute inset-0 opacity-0 transition-opacity duration-500">
                            <img 
                                src="https://images.unsplash.com/photo-1555400082-8c5cd5b3c3d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
                                alt="Sawah terasering hijau di Indonesia" 
                                class="w-full h-full object-cover"
                            />
                        </div>
                    </div>
                    
    
                    <button id="prevBtn" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-3 shadow-lg transition-all">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="nextBtn" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-3 shadow-lg transition-all">
                        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                    
     
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                        <button class="indicator w-3 h-3 rounded-full bg-white bg-opacity-80 hover:bg-opacity-100 transition-all" data-slide="0"></button>
                        <button class="indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all" data-slide="1"></button>
                        <button class="indicator w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all" data-slide="2"></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
    <section class="footer">
        <div>
            <h2>STEP INTO SPECTACULAR</h2>
            <h3 class="desk">From Hills to Heights</h3>
            <h3 class="desk">Sembalun Awaits</h3>
        </div>
        <div class="deskk">
            <h2 class="footer1">Our Contact</h2>
            <h3 class="desk1">+62 819-9763-1414</h3>
            <h3 class="desk1">happyvalleyrinjani@gmail.com</h3>
        </div>
        <div class="deskkk">
            <h2 class="footer2">Our Social Media</h2>
            <h3 class="desk2">Instagram: @happyvalleyrinjani</h3>
            <h3 class="desk2">Facebook: Happy Valley Rinjani</h3>
        </div>
    </section>

    <script>
    
        const destinations = [
            {
                name: "Gunung Rinjani",
                title: "Puncak Tertinggi Lombok",
                description: "Nikmati pendakian menantang dengan pemandangan danau segara anak yang memukau.",
                image: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",
            },
            {
                name: "Pantai Selong",
                title: "Surga Tersembunyi",
                description: "Pantai dengan pasir putih dan air jernih yang cocok untuk bersantai dan berenang.",
                image: "https://images.unsplash.com/photo-1537953773345-d172ccf13cf1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",
            },
            {
                name: "Sembalun Valley",
                title: "Lembah Hijau",
                description: "Lembah subur dengan pemandangan sawah dan bunga-bunga yang menakjubkan.",
                image: "https://images.unsplash.com/photo-1555400082-8c5cd5b3c3d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",

            },
            {
                name: "Air Terjun Tiu Kelep",
                title: "Keindahan Alam",
                description: "Air terjun yang memukau dengan kolam alami untuk berenang dan bersantai.",
                image: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",

            },
            {
                name: "Desa Adat Sade",
                title: "Budaya Lokal",
                description: "Jelajahi budaya Sasak asli dengan arsitektur tradisional dan kerajinan tangan.",
                image: "https://images.unsplash.com/photo-1586861203731-80645bb6e31f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",

            },
            {
                name: "Gili Trawangan",
                title: "Pulau Eksotis",
                description: "Surga bagi penyelam dengan terumbu karang yang indah dan kehidupan malam yang hidup.",
                image: "https://images.unsplash.com/photo-1544551763-46a013bb70d5?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80",

            }
        ];


        function getRandomDestinations(count) {
            const shuffled = [...destinations].sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        }


        function createRecommendationCard(destination) {
            return `
                <div class="recommendation-card bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="image-container">
                        <img src="${destination.image}" alt="${destination.name}" class="w-full h-full object-cover">
                        <div class="destination-title">${destination.name}</div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-800 mb-2">${destination.title}</h4>
                        <p class="text-gray-600 mb-4">${destination.description}</p>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }


        function displayRecommendations() {
            const container = document.getElementById('recommendationsContainer');
            const randomDestinations = getRandomDestinations(3); 
            
            container.innerHTML = randomDestinations.map(dest => createRecommendationCard(dest)).join('');
            
          
            document.querySelectorAll('.recommendation-card button').forEach(button => {
                button.addEventListener('click', function() {
                    alert('Fitur detail destinasi akan segera hadir! 🎉');
                });
            });
        }


        document.getElementById('refreshButton').addEventListener('click', displayRecommendations);

   
        document.addEventListener('DOMContentLoaded', displayRecommendations);

       
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const indicators = document.querySelectorAll('.indicator');
        const totalSlides = slides.length;
        let slideInterval;

        function showSlide(index) {
  
            slides.forEach(slide => {
                slide.style.opacity = '0';
            });
            
          
            indicators.forEach(indicator => {
                indicator.classList.remove('bg-opacity-80');
                indicator.classList.add('bg-opacity-50');
            });
            
      
            slides[index].style.opacity = '1';
            indicators[index].classList.remove('bg-opacity-50');
            indicators[index].classList.add('bg-opacity-80');
            
            currentSlide = index;
        }

        function nextSlide() {
            const next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }

        function prevSlide() {
            const prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
        }

        function startAutoSlide() {
            slideInterval = setInterval(nextSlide, 4000);
        }

        function stopAutoSlide() {
            clearInterval(slideInterval);
        }

  
        document.getElementById('nextBtn').addEventListener('click', () => {
            stopAutoSlide();
            nextSlide();
            startAutoSlide();
        });

        document.getElementById('prevBtn').addEventListener('click', () => {
            stopAutoSlide();
            prevSlide();
            startAutoSlide();
        });


        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                stopAutoSlide();
                showSlide(index);
                startAutoSlide();
            });
        });

  
        const slider = document.getElementById('imageSlider');
        slider.addEventListener('mouseenter', stopAutoSlide);
        slider.addEventListener('mouseleave', startAutoSlide);

   
        startAutoSlide();

     
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>