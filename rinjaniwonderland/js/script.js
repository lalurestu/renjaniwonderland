// Image Slider Functionality
let currentSlide = 0;
const slides = document.querySelectorAll(".slide");
const indicators = document.querySelectorAll(".indicator");
const totalSlides = slides.length;
let slideInterval;

function showSlide(index) {
  // Hide all slides
  slides.forEach((slide) => {
    slide.style.opacity = "0";
  });

  // Update indicators
  indicators.forEach((indicator) => {
    indicator.classList.remove("bg-opacity-80");
    indicator.classList.add("bg-opacity-50");
  });

  // Show current slide
  slides[index].style.opacity = "1";
  indicators[index].classList.remove("bg-opacity-50");
  indicators[index].classList.add("bg-opacity-80");

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
  slideInterval = setInterval(nextSlide, 4000); // Change slide every 4 seconds
}

function stopAutoSlide() {
  clearInterval(slideInterval);
}

// Event listeners for navigation buttons
document.getElementById("nextBtn").addEventListener("click", () => {
  stopAutoSlide();
  nextSlide();
  startAutoSlide();
});

document.getElementById("prevBtn").addEventListener("click", () => {
  stopAutoSlide();
  prevSlide();
  startAutoSlide();
});

// Event listeners for indicators
indicators.forEach((indicator, index) => {
  indicator.addEventListener("click", () => {
    stopAutoSlide();
    showSlide(index);
    startAutoSlide();
  });
});

// Pause auto-slide on hover
const slider = document.getElementById("imageSlider");
slider.addEventListener("mouseenter", stopAutoSlide);
slider.addEventListener("mouseleave", startAutoSlide);

// Start auto-slide when page loads
startAutoSlide();

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute("href"));
    if (target) {
      target.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });
    }
  });
});

// Add click functionality to buttons
document.querySelectorAll("button").forEach((button) => {
  if (button.textContent.includes("Lihat Detail")) {
    button.addEventListener("click", function () {
      alert("Fitur detail destinasi akan segera hadir! 🎉");
    });
  } else if (button.textContent.includes("Mulai Petualangan")) {
    button.addEventListener("click", function () {
      document.querySelector("#rekomendasi").scrollIntoView({
        behavior: "smooth",
      });
    });
  }
});
(function () {
  function c() {
    var b = a.contentDocument || a.contentWindow.document;
    if (b) {
      var d = b.createElement("script");
      d.innerHTML =
        "window.__CF$cv$params={r:'973db0ad92803da5',t:'MTc1NTk4NDQwNi4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";
      b.getElementsByTagName("head")[0].appendChild(d);
    }
  }
  if (document.body) {
    var a = document.createElement("iframe");
    a.height = 1;
    a.width = 1;
    a.style.position = "absolute";
    a.style.top = 0;
    a.style.left = 0;
    a.style.border = "none";
    a.style.visibility = "hidden";
    document.body.appendChild(a);
    if ("loading" !== document.readyState) c();
    else if (window.addEventListener)
      document.addEventListener("DOMContentLoaded", c);
    else {
      var e = document.onreadystatechange || function () {};
      document.onreadystatechange = function (b) {
        e(b);
        "loading" !== document.readyState &&
          ((document.onreadystatechange = e), c());
      };
    }
  }
})();
