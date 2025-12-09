<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paragliding Packages - Happy Valley Rinjani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=15">
</head>
<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="about3">
        <div class="about-me3">
            <h1>Paragliding Packages</h1>
        </div>
        <p>Soar through the skies and experience breathtaking aerial views with our professional paragliding pilots.</p>
    </section>

    <section class="py-10">
        <div class="wrap" style="width: 95%; max-width: 1800px; margin: 0 auto;">
            
            <div id="cards">
                <div class="text-center py-10">
                    <i class="fas fa-spinner fa-spin text-4xl text-[#26667f]"></i>
                    <p class="text-gray-500 mt-2">Memuat paket paragliding...</p>
                </div>
            </div>

        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', loadParaglidingPackages);

        function loadParaglidingPackages() {
            // Pastikan file backend ini ada
            fetch('api/get_paragliding_packages.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(packages => {
                    const container = document.getElementById('cards');
                    container.innerHTML = ''; // Bersihkan loading
                    
                    if (packages.length === 0) {
                        container.innerHTML = `
                            <div class="text-center py-20 text-white">
                                <i class="fas fa-wind text-6xl mb-4 text-[#cce8e2]"></i>
                                <h2 class="text-2xl font-bold">Belum ada paket tersedia</h2>
                                <p>Silakan hubungi admin untuk info lebih lanjut.</p>
                            </div>
                        `;
                        return;
                    }
                    
                    // Render Setiap Paket
                    packages.forEach(pkg => {
                        container.innerHTML += renderCard(pkg);
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('cards').innerHTML = `
                        <div class="text-center text-red-400 py-10">
                            <p>Gagal memuat data. Pastikan file backend ada.</p>
                        </div>
                    `;
                });
        }

        // FUNGSI RENDER HTML BARU (Sesuai CSS Info Card)
        function renderCard(pkg) {
            // Cek gambar
            const imgUrl = pkg.image ? pkg.image : 'img/cover1.png';
            
            return `
            <div class="info-card">
                
                <div class="card-content">
                    <h2 class="title">${pkg.title}</h2>
                    <p class="description mb-4">${pkg.description}</p>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-200 mt-2 border-t border-white/20 pt-4">
                        <div class="flex items-center gap-2">
                            <i class="far fa-clock text-[#cce8e2]"></i> 
                            <span>${pkg.duration}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-tachometer-alt text-[#cce8e2]"></i> 
                            <span>${pkg.difficulty}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-user text-[#cce8e2]"></i> 
                            <span>Min Age: ${pkg.min_age}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-tag text-[#cce8e2]"></i> 
                            <span class="font-bold text-[#cce8e2]">${pkg.price}</span>
                        </div>
                    </div>
                </div>

                <div class="card-visual">
                    <img src="${imgUrl}" alt="${pkg.title}">
                    <p class="location-caption">Sembalun Sky View</p>
                    
                    <a href="https://wa.me/6281997631414?text=Halo, saya tertarik dengan paket Paragliding: ${encodeURIComponent(pkg.title)}" 
                       target="_blank" 
                       class="book-button">
                       Book Now
                    </a>
                </div>

            </div>
            `;
        }
    </script>

</body>
</html>