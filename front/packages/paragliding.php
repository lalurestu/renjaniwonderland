<!DOCTYPE html>
<html lang="en">
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
                    <a href="sovenir.php">Souvenir</a>
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
    <section id="about3" class="about3">
        <div class="about-me3">
            <h1>Paragliding</h1>
        </div>
        <p>enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</p>
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
            <div class="slide"><img src="img/cover.png" alt="Gambar 1"></div>
            <div class="slide"><img src="img/cover.png" alt="Gambar 2"></div>
            <div class="slide"><img src="img/cover.png" alt="Gambar 3"></div>
            <div class="slide"><img src="img/cover.png" alt="Gambar 4"></div>
            <div class="slide"><img src="img/cover.png" alt="Gambar 5"></div>
            <div class="slide"><img src="img/cover.png" alt="Gambar 6"></div>
        </div>

        <button class="btn prev-btn">&#10094;</button>
        <button class="btn next-btn">&#10095;</button>
    </div>
    <div class="content">
        <h3 class="text-colorh2">Inclusions</h3>
        <p class="text-colorp">✅ Enjoy the remarkable Tandem Paragliding moment with certified pilot.
</p>
<p class="text-colorp">
✅ Safety gears of helmet, harness, and glider — all compatible with FAI and European Standard.
</p>
<p class="text-colorp">✅ Insurance.</p>
<p class="text-colorp">✅ Borrow our GoPro HERO9 Series to record your special moment.</p>
    </div>
    <div class="content">
        <h3 class="text-colorh2">Exclusions</h3>
        <p class="text-colorp">Private transportation to and from the flying site, and all personal expense.</p>
    </div>
    <div class="content">
        <h3 class="text-colorh2">Facilities</h3>
        <p class="text-colorp">✅ Ei-Fi
</p>
<p class="text-colorp">
✅ Electric port for charging
</p>
<p class="text-colorp">✅ Lockers
</p>
<p class="text-colorp">✅ Toilet
</p>
<p class="text-colorp">✅ Comfortable lobby and waiting area
</p>
<p class="text-colorp">✅ Sport shoes to wear during the flight, for those who don’t wear any trainers or sneakers
</p>
<p class="text-colorp">✅ First Aid Kit and medicine — if needed
</p>
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
const slider = document.querySelector('.slider');
const slides = document.querySelectorAll('.slide');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

let currentIndex = 0;
const totalSlides = slides.length;
const slidesVisible = 3;

function updateSlider() {
    const slideWidth = slides[0].clientWidth;
    slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
}

nextBtn.addEventListener('click', () => {
    if (currentIndex < totalSlides - slidesVisible) {
        currentIndex++;
        updateSlider();
    }
});


prevBtn.addEventListener('click', () => {

    if (currentIndex > 0) {
        currentIndex--;
        updateSlider();
    }
});


window.addEventListener('resize', updateSlider);
</script>
</body>
</html>