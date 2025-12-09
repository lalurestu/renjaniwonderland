<?php
// 1. Hubungkan ke database
include 'includes/db_connect.php';

// 2. Ambil data gambar khusus kategori "Human Interest Photography"
$sql = "SELECT * FROM photography_packages WHERE category = 'Human Interest Photography' ORDER BY created_at DESC";
$result = $conn->query($sql);

$photos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $photos[] = $row;
    }
}

// 3. Pisahkan foto untuk layout atas (3 foto) dan bawah (5 foto berikutnya)
$top_photos = array_slice($photos, 0, 3); 
$bottom_photos = array_slice($photos, 3, 5); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Interest Gallery - Happy Valley Rinjani</title>
    <link rel="stylesheet" href="css/gallery.css?v=3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link rel="stylesheet" href="css/style.css?v=15">
</head>
<body>
    
<?php include 'includes/navbar.php'; ?>
    <section id="about1" class="about1">
        <div class="about-me1">
            <h1>Human Interest</h1>
        </div>
        <p>Enjoy the charm of its iconic hills, and soar freely through the skies with paragliding over breathtaking valleys.</p>
    </section>

    <div class="tracking-in-expand">
        <h1>Human Interest Gallery</h1>
    </div>

    <div class="container">
        <?php if (count($top_photos) > 0): ?>
            <?php foreach ($top_photos as $photo): ?>
                <div class="gallery-item scale-in-center">
                    <img src="<?php echo $photo['image']; ?>" alt="<?php echo $photo['title']; ?>">
                    
                    <div class="overlay">
                        <h3><?php echo $photo['title']; ?></h3>
                        <p><?php echo $photo['description']; ?></p>
                        <span class="price"><?php echo $photo['price']; ?></span>
                        
                        <a href="booking.php?id=<?php echo $photo['id']; ?>" class="book-btn">
                            <i class="fas fa-calendar-check"></i> Book Now
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #fff; text-align: center; width: 100%;">Belum ada foto kategori ini.</p>
        <?php endif; ?>
    </div>

    <?php if (count($bottom_photos) > 0): ?>
    <div class="tracking-in-expand">
        <h1>Other Activity</h1>
    </div>

    <div class="container1">
        <?php foreach ($bottom_photos as $photo): ?>
            <div class="gallery-item slide-in-fwd-center">
                <img src="<?php echo $photo['image']; ?>" alt="<?php echo $photo['title']; ?>">
                
                <div class="overlay">
                    <h3><?php echo $photo['title']; ?></h3>
                    <p><?php echo $photo['description']; ?></p>
                    <span class="price"><?php echo $photo['price']; ?></span>
                    
                    <a href="booking.php?id=<?php echo $photo['id']; ?>" class="book-btn">
                        <i class="fas fa-calendar-check"></i> Book Now
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php include 'includes/footer.php'; ?>

</body>
</html>