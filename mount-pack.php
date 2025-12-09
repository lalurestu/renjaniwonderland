<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mount Rinjani Packages</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css?v=15">
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <section class="about1">
        <div class="about-me1">
            <h1>Mount Packages</h1>
        </div>
        <p>Experience the ultimate adventure with our carefully curated Mount Rinjani trekking packages.</p>
    </section>

    <section class="py-10">
        <div class="wrap" style="width: 95%; max-width: 1800px; margin: 0 auto;">
            <div id="cards">
                <p class="text-center text-white">Memuat paket...</p>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', loadMountPackages);

        function loadMountPackages() {
            // Pastikan file PHP backend ini ada
            fetch('api/get_mount_packages.php')
                .then(res => res.json())
                .then(packages => {
                    const container = document.getElementById('cards');
                    container.innerHTML = '';

                    if (packages.length === 0) {
                        container.innerHTML = '<p class="text-center text-white">Belum ada paket tersedia.</p>';
                        return;
                    }

                    packages.forEach(pkg => {
                        container.innerHTML += renderCard(pkg);
                    });
                })
                .catch(err => {
                    console.error(err);
                    document.getElementById('cards').innerHTML = '<p class="text-center text-red-400">Gagal memuat data.</p>';
                });
        }

        // FUNGSI RENDER HTML BARU (Sesuai CSS Info Card)
        function renderCard(pkg) {
            // Fallback Image
            const imgUrl = pkg.image ? pkg.image : 'img/rinjani.png';

            return `
            <div class="info-card">
                <div class="card-content">
                    <h2 class="title">${pkg.title}</h2>
                    <p class="description mb-4">${pkg.description}</p>
                    
                    <div class="grid grid-cols-2 gap-4 text-sm text-gray-200 mt-2">
                        <div class="flex items-center gap-2"><i class="far fa-clock text-[#cce8e2]"></i> ${pkg.duration}</div>
                        <div class="flex items-center gap-2"><i class="fas fa-mountain text-[#cce8e2]"></i> ${pkg.difficulty}</div>
                        <div class="flex items-center gap-2"><i class="fas fa-map-marker-alt text-[#cce8e2]"></i> ${pkg.route}</div>
                        <div class="flex items-center gap-2"><i class="fas fa-tag text-[#cce8e2]"></i> ${pkg.price}</div>
                    </div>
                </div>

                <div class="card-visual">
                    <img src="${imgUrl}" alt="${pkg.title}">
                    <p class="location-caption">${pkg.route || 'Rinjani National Park'}</p>
                    <a href="https://wa.me/6281997631414?text=Halo, saya tertarik dengan paket Mount Rinjani: ${encodeURIComponent(pkg.title)}" target="_blank" class="book-button">Book Now</a>
                </div>
            </div>
            `;
        }
    </script>
</body>

</html>