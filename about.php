<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sembalun – About & Team</title>
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include 'includes/navbar.php'; ?>
  <section id="about1" class="about1">
    <div class="about-me1">
      <h1>About Us</h1>
    </div>
    <p>enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking
      valleys.</p>
  </section>
  <div class="wrap">
    <section class="hero" aria-label="About Sembalun Travel Organizer">
      <p class="lead">We are a team of passionate locals dedicated to showcasing the hidden gems of Sembalun. Our
        mission is to provide an unforgettable travel experience while promoting sustainable tourism and local culture.
      </p>
      <div class="bullet">
        <h3>Local-led experiences</h3>
        <p style="margin:0">At Sembalun Travel Organizer, we believe the best experiences are led by the people who know
          the place best. Our team consists of native Sembalun residents who have spent years navigating every trail.
        </p>
      </div>
      <div class="bullet">
        <h3>Our expertise</h3>
        <ul>
          <li>Mount Rinjani Trekking: Safe, well‑managed, and eco‑conscious expeditions.</li>
          <li>Sembalun Hill Exploration: Panoramic views from Pergasingan and Selong.</li>
          <li>Paragliding: Unparalleled flying experience above Sembalun with licensed instructors.</li>
        </ul>
      </div>

      <div class="map-section">
        <h2>Lokasi Kantor Kami</h2>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.7036776270736!2d116.53686980087859!3d-8.361527162613017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc2f006883cf6f%3A0x3309ddd9e4a1a3eb!2sRinjani%20Wonderland!5e0!3m2!1sid!2sid!4v1764854094238!5m2!1sid!2sid"
          allowfullscreen="" loading="lazy">
        </iframe>
      </div>


      <section class="team" aria-label="Our Team">
        <div class="slider" id="slider">
          <button class="arrow prev" aria-label="Previous">◀</button>
          <button class="arrow next" aria-label="Next">▶</button>
          <div class="track" id="track"></div>
          <div class="dots" id="dots" role="tablist" aria-label="Slides pagination"></div>
        </div>
      </section>
  </div>

  <template id="tpl-slide">
    <article class="slide">
      <img alt="" />
      <div class="cap">
        <div class="name" data-name></div>
        <div class="role" data-role></div>
      </div>
    </article>
  </template>
  <?php include 'includes/footer.php'; ?>
  <script>
    const team = [
      { name: 'Dash', role: 'Field Manager', img: 'https://images.unsplash.com/photo-1548142813-c348350df52b?q=80&w=1800&auto=format&fit=crop' },
      { name: 'Romeo', role: 'Tour Planner', img: 'https://images.unsplash.com/photo-1529665253569-6d01c0eaf7b6?q=80&w=1800&auto=format&fit=crop' },
      { name: 'Aisha', role: 'Mountain Guide', img: 'https://images.unsplash.com/photo-1520975922224-c6b2bb33f5d0?q=80&w=1800&auto=format&fit=crop' },
      { name: 'Fajar', role: 'Safety Officer', img: 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=1800&auto=format&fit=crop' }
    ];

    const track = document.getElementById('track');
    const dots = document.getElementById('dots');
    const tpl = document.getElementById('tpl-slide');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');

    team.forEach((m, i) => {
      const node = tpl.content.cloneNode(true);
      const img = node.querySelector('img');
      node.querySelector('[data-name]').textContent = m.name;
      node.querySelector('[data-role]').textContent = m.role;
      img.src = m.img; img.alt = `${m.name} – ${m.role}`;
      track.appendChild(node);

    });

    const slides = Array.from(track.children);
    let index = 0;

    function updateDots() {
      dots.querySelectorAll('.dot').forEach((el, i) => {
        el.setAttribute('aria-current', i === index ? 'true' : 'false');
      });
    }

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      const target = slides[index];
      target.scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' });
      updateDots();
    }


    prevBtn.addEventListener('click', () => goTo(index - 1));
    nextBtn.addEventListener('click', () => goTo(index + 1));


    let startX = 0; let isDown = false; let startScroll = 0;
    track.addEventListener('pointerdown', e => { isDown = true; startX = e.clientX; startScroll = track.scrollLeft; track.setPointerCapture(e.pointerId) });
    track.addEventListener('pointermove', e => { if (!isDown) return; track.scrollLeft = startScroll - (e.clientX - startX) });
    track.addEventListener('pointerup', () => { isDown = false; snapToNearest() });
    track.addEventListener('pointercancel', () => { isDown = false });

    function snapToNearest() {
      const slideW = slides[0].getBoundingClientRect().width + 16; // width + gap
      const nearest = Math.round(track.scrollLeft / slideW);
      goTo(nearest);
    }


    track.setAttribute('tabindex', '0');
    track.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') nextBtn.click();
      if (e.key === 'ArrowLeft') prevBtn.click();
    });


    goTo(0);
    window.addEventListener('resize', () => updateDots());

    var navLinks = document.getElementById("navLinks");
    function showMenu() { navLinks.style.right = "0"; }
    function hideMenu() { navLinks.style.right = "-250px"; }

  </script>
</body>

</html>