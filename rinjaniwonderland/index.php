<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rinjani Wonderland</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=18">
    <style>
        .text-colorh3 {
            color: #DDF4E7;
            font-weight: 600;
            font-size: 49.45px;
        }

        /* CSS SLIDER FIX: Agar gambar pas di dalam kotak */
        .home-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .home-slide.active {
            opacity: 1;
            z-index: 10;
        }

        .home-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Gambar mengisi kotak tanpa gepeng */
        }
    </style>
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <section id="about" class="about">
        <div class="about-me">
            <h1>Rinjani Wonderland</span></h1>
        </div>
        <h2>We are your trusted partner in exploring the beauty of Sembalun, Lombok. With a professional team, we guide
            you to conquer the summit of Mount Rinjani, enjoy the charm of its iconic hills, and soar freely through the
            skies with paragliding over breathtaking valleys.</h2>
    </section>

    <section id="rekomendasi" class="py-16 px-6">
        <div class="container mx-auto">
            <div class="text-start mb-12">
                <h3 class="text-colorh3">Rekomendasi Destinasi</h3>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="recommendationsContainer">
                <p class="text-white col-span-3 text-center">Memuat rekomendasi...</p>
            </div>

            <button id="refreshButton"
                class="refresh-btn text-white px-6 py-3 rounded-full mt-8 font-semibold flex items-center justify-center">
                <i class="fas fa-sync-alt mr-2"></i> Lihat Rekomendasi Lain
            </button>
        </div>
    </section>

    <section class="py-20 px-6">
        <div class="container mx-auto">
            <div class="text-start mb-12">
                <h3 class="text-colorh3">Gallery</h3>
            </div>

            <div
                class="relative w-full h-[500px] overflow-hidden rounded-3xl shadow-2xl group border-4 border-[#26667f]">

                <div id="homeGallerySlider" class="relative w-full h-full bg-gray-900">
                    <div class="home-slide active">
                        <img src="img/rinjani.png" alt="Loading...">
                    </div>
                </div>

                <button id="homePrevBtn"
                    class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full transition-all opacity-0 group-hover:opacity-100 z-20">
                    <i class="fas fa-chevron-left text-2xl"></i>
                </button>

                <button id="homeNextBtn"
                    class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/60 text-white p-3 rounded-full transition-all opacity-0 group-hover:opacity-100 z-20">
                    <i class="fas fa-chevron-right text-2xl"></i>
                </button>

                <div id="homeIndicators" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 z-20"></div>
            </div>
        </div>
    </section>

    <!-- 4. CALL TO ACTION (CTA) -->
    <section class="py-20 px-6 bg-gradient-to-r from-[#26667f] to-[#1a4a5e] text-center text-white">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold mb-6">Ready for the Adventure of a Lifetime?</h2>
            <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto">Book your trip now and explore the hidden gems of
                Lombok with us. Safe, fun, and unforgettable.</p>
            <a href="#rekomendasi" target="_blank"
                class="inline-block bg-[#ddf4e7] text-[#26667f] px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:scale-105 transition-all duration-300 shadow-lg">
                <i class="fas fa-map-marked-alt mr-2"></i> View Packages
            </a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        // --- 1. REKOMENDASI (TETAP SAMA) ---
        function createRecommendationCard(destination) {
            let detailUrl = '#';
            const type = destination.package_type ? destination.package_type.toLowerCase() : '';

            if (type === 'mount') detailUrl = 'mount-pack.php';
            else if (type === 'hills') detailUrl = 'hills-pack.php';
            else if (type === 'paragliding') detailUrl = 'paragliding-pack.php';
            else if (type === 'souvenir') detailUrl = 'souvenirs.php';
            else detailUrl = 'index.php#package';

            let imageUrl = destination.image ? destination.image : 'img/cover1.png';

            return `
                <div class="recommendation-card bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col h-full transform transition hover:-translate-y-2 hover:shadow-2xl duration-300">
                    <div class="image-container h-56 overflow-hidden relative group">
                        <img src="${imageUrl}" alt="${destination.title}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute top-0 right-0 bg-[#26667f] text-white text-xs px-3 py-1 rounded-bl-lg font-bold uppercase shadow-md">
                            ${destination.package_type || 'Wisata'}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h4 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">${destination.title}</h4>
                        <p class="text-gray-600 mb-4 line-clamp-3 text-sm flex-grow">${destination.description}</p>
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="${detailUrl}" class="block w-full text-center bg-gradient-to-r from-[#26667f] to-[#1f556a] text-white px-4 py-2 rounded-lg hover:opacity-90 transition-all duration-300 shadow-md font-medium">
                                Lihat Paket
                            </a>
                        </div>
                    </div>
                </div>
            `;
        }

        async function displayRecommendations() {
            const container = document.getElementById('recommendationsContainer');
            container.innerHTML = '<p class="text-white col-span-3 text-center py-10">Sedang memuat rekomendasi...</p>';

            try {
                const response = await fetch('api/get_recomend.php');
                const result = await response.json();

                if (result.status === 'success' && result.data.length > 0) {
                    container.innerHTML = result.data.map(dest => createRecommendationCard(dest)).join('');
                } else {
                    container.innerHTML = '<p class="text-white col-span-3 text-center py-10">Belum ada rekomendasi saat ini.</p>';
                }
            } catch (error) {
                console.error('Error:', error);
                container.innerHTML = `<p class="text-red-300 col-span-3 text-center py-10">Gagal memuat data.</p>`;
            }
        }

        // --- 2. LOGIKA GALLERY SLIDER ---
        async function initHomeGallery() {
            const sliderContainer = document.getElementById('homeGallerySlider');
            const indicatorsContainer = document.getElementById('homeIndicators');

            try {
                const response = await fetch('api/get_gallery.php');
                const result = await response.json();

                if (result.status === 'success' && result.data.length > 0) {
                    sliderContainer.innerHTML = '';
                    indicatorsContainer.innerHTML = '';

                    result.data.forEach((photo, index) => {
                        const activeClass = index === 0 ? 'active' : '';
                        const slideHTML = `
                            <div class="home-slide ${activeClass}" data-index="${index}">
                                <img src="${photo.image}" alt="${photo.title}">
                                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 via-black/40 to-transparent p-6">
                                    <h3 class="text-white text-2xl font-bold mb-1">${photo.title}</h3>
                                    <p class="text-gray-200 text-sm uppercase tracking-wider">${photo.category}</p>
                                </div>
                            </div>
                        `;
                        sliderContainer.innerHTML += slideHTML;

                        const activeDot = index === 0 ? 'bg-white w-8' : 'bg-white/50 w-3 hover:bg-white';
                        indicatorsContainer.innerHTML += `<button class="h-2 rounded-full transition-all duration-300 ${activeDot}" onclick="goToSlide(${index})"></button>`;
                    });

                    startHomeSlider(result.data.length);
                }
            } catch (error) {
                console.error("Gallery Error:", error);
            }
        }

        let homeSlideIndex = 0;
        let homeSlideInterval;
        let totalHomeSlides = 0;

        function startHomeSlider(count) {
            totalHomeSlides = count;
            if (count > 1) {
                homeSlideInterval = setInterval(nextHomeSlide, 5000);
            }
        }

        function updateHomeSlider() {
            const slides = document.querySelectorAll('.home-slide');
            const dots = document.getElementById('homeIndicators').children;

            slides.forEach((slide, idx) => {
                if (idx === homeSlideIndex) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });

            Array.from(dots).forEach((dot, idx) => {
                if (idx === homeSlideIndex) {
                    dot.className = 'h-2 rounded-full transition-all duration-300 bg-white w-8';
                } else {
                    dot.className = 'h-2 rounded-full transition-all duration-300 bg-white/50 w-3 hover:bg-white';
                }
            });
        }

        function nextHomeSlide() {
            homeSlideIndex = (homeSlideIndex + 1) % totalHomeSlides;
            updateHomeSlider();
        }

        function prevHomeSlide() {
            homeSlideIndex = (homeSlideIndex - 1 + totalHomeSlides) % totalHomeSlides;
            updateHomeSlider();
        }

        function goToSlide(index) {
            homeSlideIndex = index;
            updateHomeSlider();
            resetTimer();
        }

        function resetTimer() {
            clearInterval(homeSlideInterval);
            homeSlideInterval = setInterval(nextHomeSlide, 5000);
        }

        document.getElementById('homeNextBtn').addEventListener('click', () => { nextHomeSlide(); resetTimer(); });
        document.getElementById('homePrevBtn').addEventListener('click', () => { prevHomeSlide(); resetTimer(); });

        document.addEventListener('DOMContentLoaded', () => {
            displayRecommendations();
            initHomeGallery();
        });

        // --- 3. FAQ TOGGLE ---
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('i');

            content.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        const refreshBtn = document.getElementById('refreshButton');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', () => {
                refreshBtn.innerHTML = 'Memuat...';
                refreshBtn.disabled = true;
                displayRecommendations().then(() => {
                    refreshBtn.innerHTML = '<i class="fas fa-sync-alt mr-2"></i> Lihat Rekomendasi Lain';
                    refreshBtn.disabled = false;
                });
            });
        }
    </script>
</body>

</html>