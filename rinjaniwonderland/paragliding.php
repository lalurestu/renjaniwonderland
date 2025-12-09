<?php include 'includes/db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paragliding - Happy Valley Rinjani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=15">
    <style>
        .text-colorh3{
            color: #DDF4E7;
            font-weight: 600;
            font-size: 49.45px;
            margin-top: 1rem;
            margin-left: 3rem;
        }
        .text-colorp{
            color: #DDF4E7;
            font-weight: 300;
            font-size: 20px;
            margin-left: 5rem;
            margin-top: 2rem;
            line-height: 2;
            position: relative;
            margin-bottom: 5rem;
        }
        .text-colorh2{
            color: #DDF4E7;
            font-weight: 600;
            font-size: 40px;
            margin-top: 1rem;
            margin-left: 3rem;
        }
        
        /* Tambahan agar slider gambar rapi */
        .slide img {
            width: 100%;
            height: 400px; /* Tinggi fix agar seragam */
            object-fit: cover; /* Agar gambar tidak gepeng */
            border-radius: 10px;
        }
    </style>
</head>

<body>
        <?php include 'includes/navbar.php'; ?>
    <section id="about3" class="about3">
        <div class="about-me3">
            <h1>Paragliding</h1>
        </div>
        <p>Enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</p>
    </section>

    <section>
        <div class="sub">
            <h1 class="text-colorh3">Sembalun Tandem Paragliding</h1>
        </div>
        <div class="paragraf">
            <p class="text-colorp">Get an exciting experience by paragliding from various hills in Sembalun, even from Mount Rinjani.</p>
        </div>

        <div class="slider-container">
            <div class="slider">
                <?php
                // Query mengambil paket khusus Paragliding
                $sql = "SELECT * FROM packages WHERE package_type = 'paragliding' ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Pastikan path gambar benar
                        $imagePath = $row['image']; 
                        if(empty($imagePath)) {
                            $imagePath = 'https://via.placeholder.com/800x400?text=No+Image';
                        }
                        ?>
                        <div class="slide">
                            <img src="<?php echo $imagePath; ?>" alt="<?php echo $row['title']; ?>">
                            </div>
                        <?php
                    }
                } else {
                    // Tampilkan gambar default jika database kosong
                    echo '<div class="slide"><img src="horizontal/riduwan-gustama-Cg0vMCKWEXc-unsplash.jpg" alt="Default 1"></div>';
                    echo '<div class="slide"><img src="horizontal/kerensa-pickett-LKQGNBZAWU8-unsplash.jpg" alt="Default 2"></div>';
                    echo '<div class="slide"><img src="horizontal/daniil-silantev-LUX9qU74CAQ-unsplash.jpg" alt="Default 3"></div>';
                }
                ?>
            </div>

            <button class="btn prev-btn">&#10094;</button>
            <button class="btn next-btn">&#10095;</button>
        </div>

<div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <h3 class="text-xl font-bold text-[#26667f] mb-4"><i class="fas fa-check-circle text-green-500"></i> Inclusions</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>Certified Pilot Tandem</li>
                    <li>Safety Gears (Helmet, Harness)</li>
                    <li>Insurance Coverage</li>
                    <li>GoPro Documentation</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <h3 class="text-xl font-bold text-[#26667f] mb-4"><i class="fas fa-times-circle text-red-500"></i> Exclusions</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>Transport to flight site</li>
                    <li>Personal Expenses</li>
                    <li>Meals & Drinks</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
                <h3 class="text-xl font-bold text-[#26667f] mb-4"><i class="fas fa-concierge-bell text-yellow-500"></i> Facilities</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>Comfortable Lobby</li>
                    <li>Lockers & Toilet</li>
                    <li>Free WiFi & Charging</li>
                    <li>First Aid Kit</li>
                </ul>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="paragliding-pack.php" class="book-button inline-block px-10">Lihat Daftar Paket</a>
        </div>

    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        let currentIndex = 0;
        const totalSlides = slides.length;
        const slidesVisible = window.innerWidth <= 768 ? 1 : 3; 

        function updateSlider() {
            if(slides.length > 0){
                const slideWidth = slides[0].clientWidth;
                slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            }
        }
        nextBtn.addEventListener('click', () => {
            if (currentIndex < totalSlides - slidesVisible) { currentIndex++; updateSlider(); } 
            else { currentIndex = 0; updateSlider(); }
        });
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) { currentIndex--; updateSlider(); } 
            else { currentIndex = totalSlides - slidesVisible; if(currentIndex < 0) currentIndex=0; updateSlider(); }
        });
        window.addEventListener('resize', () => { currentIndex = 0; updateSlider(); });
    </script>
</body>
</html>