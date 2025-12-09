<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souvenir Packages - Happy Valley Rinjani</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Hero Section */
        .hero-section {
            position: relative;
            height: 300px;
            background: linear-gradient(rgba(31, 59, 75, 0.8), rgba(31, 59, 75, 0.9)), url('img/rinjani-bg.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
        }

        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .admin-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .button-wrapper {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .add-button {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4);
        }

        .card {
            position: relative;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            overflow: hidden;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .package-info {
            display: flex;
            gap: 10px;
            margin: 8px 0;
        }

        .package-type {
            background: #4CAF50;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .card-buttons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .edit-button, .delete-button {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .edit-button {
            background: #FFC107;
            color: #333;
        }

        .edit-button:hover {
            background: #FFB300;
        }

        .delete-button {
            background: #f44336;
            color: white;
        }

        .delete-button:hover {
            background: #d32f2f;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            backdrop-filter: blur(5px);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 0;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 10px 50px rgba(0,0,0,0.3);
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-header {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 20px 30px;
            border-radius: 12px 12px 0 0;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 24px;
        }

        .modal-body {
            padding: 30px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .modal-footer {
            padding: 20px 30px;
            background: #f8f9fa;
            border-radius: 0 0 12px 12px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4CAF50;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn-primary, .btn-secondary {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            min-width: 100px;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        .no-packages {
            text-align: center;
            padding: 50px 20px;
            color: #666;
            font-size: 18px;
        }

        .no-packages i {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ccc;
        }

        .souvenir-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .price-input-wrapper {
            position: relative;
        }

        .price-input-wrapper::before {
            content: "Rp";
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-weight: bold;
            z-index: 1;
        }

        .price-input-wrapper input {
            padding-left: 40px !important;
        }
        /* Souvenir Grid Styles */
.souvenir-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    margin-top: 30px;
}

.card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.card-image {
    position: relative;
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.discount-badge {
    position: absolute;
    top: 10px;
    right: 10px;
    background: #ff9800;
    color: white;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: bold;
}

.card-content {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.card-header {
    margin-bottom: 15px;
}

.product-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #333;
    margin: 0 0 10px 0;
    line-height: 1.3;
}

.product-price {
    font-size: 1.3rem;
    font-weight: bold;
    color: #4CAF50;
    margin: 0;
}

.product-description {
    color: #666;
    line-height: 1.5;
    margin: 0 0 15px 0;
    flex: 1;
}

.product-details {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.detail-item {
    margin-bottom: 8px;
    font-size: 14px;
}

.detail-item:last-child {
    margin-bottom: 0;
}

.detail-item strong {
    color: #333;
}

.card-buttons {
    display: flex;
    gap: 10px;
    margin-top: auto;
}

.edit-button, .delete-button {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 14px;
    flex: 1;
    justify-content: center;
}

.edit-button {
    background: #FFC107;
    color: #333;
}

.edit-button:hover {
    background: #FFB300;
    transform: translateY(-2px);
}

.delete-button {
    background: #f44336;
    color: white;
}

.delete-button:hover {
    background: #d32f2f;
    transform: translateY(-2px);
}

.no-packages {
    text-align: center;
    padding: 50px 20px;
    color: #666;
    font-size: 18px;
    grid-column: 1 / -1;
}

.no-packages i {
    font-size: 48px;
    margin-bottom: 20px;
    color: #ccc;
}

/* Responsive Design */
@media (max-width: 768px) {
    .souvenir-grid {
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }
    
    .card-buttons {
        flex-direction: column;
    }
    
    .edit-button, .delete-button {
        width: 100%;
    }
}
    </style>
</head>
<body>
    
    <main>
        <div class="hero-section">
            <div class="overlay"></div>
            <h1>Souvenir Packages</h1>
            <p>Bring home memorable souvenirs from your adventure</p>
        </div>

        <div class="content-wrapper">
            <div class="admin-controls">
                <div class="button-wrapper">
                    <button class="add-button" id="addSouvenirBtn">
                        <i class="fas fa-plus"></i> Tambah Souvenir
                    </button>
                    <a href="index.php" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Package Utama
                    </a>
                </div>
            </div>
<div class="souvenir-grid" id="souvenirContainer">
    <?php
    include '../includes/db_connect.php';
    
    // Perbaikan: Struktur tabel tanpa material
    $createTable = "CREATE TABLE IF NOT EXISTS souvenirs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        category VARCHAR(100) NOT NULL,
        stock INT NOT NULL,
        price VARCHAR(50) NOT NULL,
        discount INT DEFAULT 0,
        image VARCHAR(255) NOT NULL,
        status ENUM('active', 'inactive') DEFAULT 'active',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        error_log("Souvenirs table checked/created successfully");
    } else {
        error_log("Error creating table: " . $conn->error);
    }

    // Query untuk mengambil data
    $sql = "SELECT * FROM souvenirs WHERE status = 'active' ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $discountBadge = $row['discount'] > 0 ? 
                '<span class="discount-badge">-'.$row['discount'].'%</span>' : '';
            
            echo '<div class="card" data-id="' . $row['id'] . '">';
            echo '    <div class="card-image">';
            echo '        <img src="' . $row['image'] . '" alt="' . $row['name'] . '" onerror="this.src=\'https://via.placeholder.com/400x200?text=Souvenir+Rinjani\'">';
            echo          $discountBadge;
            echo '    </div>';
            echo '    <div class="card-content">';
            echo '        <div class="card-header">';
            echo '            <h3 class="product-name">' . $row['name'] . '</h3>';
            echo '            <div class="product-price">' . $row['price'] . '</div>';
            echo '        </div>';
            echo '        <p class="product-description">' . $row['description'] . '</p>';
            echo '        <div class="product-details">';
            echo '            <div class="detail-item"><strong>Kategori:</strong> ' . $row['category'] . '</div>';
            echo '            <div class="detail-item"><strong>Stok:</strong> ' . $row['stock'] . ' pcs</div>';
            if ($row['discount'] > 0) {
                echo '            <div class="detail-item"><strong>Diskon:</strong> ' . $row['discount'] . '%</div>';
            }
            echo '        </div>';
            echo '        <div class="card-buttons">';
            echo '            <button class="edit-button" onclick="editSouvenir(' . $row['id'] . ')">';
            echo '                <i class="fas fa-edit"></i> EDIT';
            echo '            </button>';
            echo '            <button class="delete-button" onclick="deleteSouvenir(' . $row['id'] . ')">';
            echo '                <i class="fas fa-trash"></i> DELETE';
            echo '            </button>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        }
    } else {
        echo '<div class="no-packages">';
        echo '    <i class="fas fa-gift"></i>';
        echo '    <p>Belum ada souvenir. Klik "Tambah Souvenir" untuk menambahkan.</p>';
        echo '</div>';
    }
    $conn->close();
    ?>
</div>
            </div>
        </div>
    </main>

    <div id="souvenirModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="souvenirModalTitle">Tambah Souvenir</h2>
            </div>
            <form id="souvenirForm" enctype="multipart/form-data">
                <input type="hidden" id="souvenirId" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="souvenirName">Nama Souvenir *</label>
                        <input type="text" id="souvenirName" name="name" placeholder="Masukkan nama souvenir" required>
                    </div>

                    <div class="form-group">
                        <label for="souvenirDescription">Deskripsi *</label>
                        <textarea id="souvenirDescription" name="description" placeholder="Deskripsikan souvenir..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="souvenirCategory">Kategori *</label>
                        <select id="souvenirCategory" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Coffee">Coffee</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="souvenirStock">Stock *</label>
                        <input type="number" id="souvenirStock" name="stock" min="1" placeholder="50" required>
                    </div>

                    <div class="form-group">
                        <label for="souvenirPrice">Harga *</label>
                        <div class="price-input-wrapper">
                            <input type="text" id="souvenirPrice" name="price" placeholder="150000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="souvenirDiscount">Diskon (%)</label>
                        <input type="number" id="souvenirDiscount" name="discount" min="0" max="100" placeholder="0">
                    </div>

                    <div class="form-group">
                        <label for="souvenirImage">Foto Souvenir *</label>
                        <input type="file" id="souvenirImage" name="image" accept="image/*">
                        <small style="color: #666; font-size: 12px;">Format: JPG, PNG, GIF. Max size: 2MB</small>
                        <div id="currentSouvenirImage" style="display: none; margin-top: 10px;">
                            <p style="margin-bottom: 5px; font-weight: 600;">Gambar Saat Ini:</p>
                            <img id="currentSouvenirImagePreview" src="" alt="Current Image" style="max-width: 200px; border-radius: 8px; border: 2px solid #e0e0e0;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeSouvenirModal()">Batalkan</button>
                    <button type="submit" class="btn-primary" id="submitSouvenirButton">
                        <i class="fas fa-save"></i> Simpan Souvenir
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let isEditSouvenirMode = false;

        function openSouvenirModal(editData = null) {
            isEditSouvenirMode = editData !== null;
            const modal = document.getElementById('souvenirModal');
            const title = document.getElementById('souvenirModalTitle');
            const submitButton = document.getElementById('submitSouvenirButton');
            
            if (isEditSouvenirMode) {
                title.textContent = 'Edit Souvenir';
                submitButton.innerHTML = '<i class="fas fa-save"></i> Update Souvenir';
                
                document.getElementById('souvenirId').value = editData.id;
                document.getElementById('souvenirName').value = editData.name;
                document.getElementById('souvenirDescription').value = editData.description;
                document.getElementById('souvenirCategory').value = editData.category;
                document.getElementById('souvenirStock').value = editData.stock;
                document.getElementById('souvenirDiscount').value = editData.discount || 0;
                
                // Format harga untuk edit - hapus "Rp. " dan titik
                const price = editData.price.replace('Rp. ', '').replace(/\./g, '');
                document.getElementById('souvenirPrice').value = price;

                if (editData.image) {
                    document.getElementById('currentSouvenirImage').style.display = 'block';
                    document.getElementById('currentSouvenirImagePreview').src = editData.image;
                    document.getElementById('souvenirImage').required = false;
                }
            } else {
                title.textContent = 'Tambah Souvenir';
                submitButton.innerHTML = '<i class="fas fa-save"></i> Simpan Souvenir';
                document.getElementById('souvenirForm').reset();
                document.getElementById('currentSouvenirImage').style.display = 'none';
                document.getElementById('souvenirImage').required = true;
            }
            
            modal.style.display = 'block';
        }

        function closeSouvenirModal() {
            document.getElementById('souvenirModal').style.display = 'none';
            isEditSouvenirMode = false;
        }

       function editSouvenir(id) {
    console.log('=== EDIT SOUVENIR ===');
    console.log('Editing ID:', id);
    
    // Test langsung di browser
    const testUrl = '../api/get_souvenir.php?id=' + id;
    console.log('Test URL:', testUrl);
    
    // Buka URL di tab baru untuk test
    // window.open(testUrl, '_blank');
    
    fetch(testUrl)
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response ok:', response.ok);
            
            if (!response.ok) {
                throw new Error('HTTP error! status: ' + response.status);
            }
            
            return response.text(); // Baca sebagai text dulu
        })
        .then(text => {
            console.log('Raw response text:', text);
            
            // Coba parse JSON
            try {
                const data = JSON.parse(text);
                console.log('Parsed JSON data:', data);
                
                if (data.status === 'success') {
                    console.log('Data received successfully');
                    openSouvenirModal(data);
                } else {
                    console.error('Server returned error:', data);
                    alert('Gagal mengambil data: ' + (data.message || 'Unknown error'));
                }
            } catch (e) {
                console.error('JSON Parse Error:', e);
                console.error('Raw text that failed to parse:', text);
                alert('Response tidak valid dari server. Lihat console untuk detail.');
            }
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
}

function deleteSouvenir(id) {
    console.log('Deleting souvenir ID:', id);
    
    if (confirm('Apakah Anda yakin ingin menghapus souvenir ini?')) {
        fetch('actions/delete_souvenir.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + id
        })
        .then(response => {
            console.log('Delete response status:', response.status);
            return response.text();
        })
        .then(text => {
            console.log('Delete response text:', text);
            if (text.trim() === 'success') {
                alert('Souvenir berhasil dihapus');
                location.reload();
            } else {
                alert('Gagal menghapus souvenir. Response: ' + text);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus souvenir: ' + error.message);
        });
    }
}

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addSouvenirBtn').addEventListener('click', () => openSouvenirModal());

            document.getElementById('souvenirForm').addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Form submitted');
                
                const formData = new FormData(this);
                const price = document.getElementById('souvenirPrice').value;
                
                if (!price || isNaN(parseFloat(price)) || parseFloat(price) <= 0) {
                    alert('Harap masukkan harga yang valid (angka positif).');
                    return;
                }


                const formattedPrice = '$. ' + parseInt(price).toLocaleString('id-ID');
                formData.set('price', formattedPrice);

                const url = isEditSouvenirMode ? 'actions/update_souvenir.php' : 'actions/add_souvenir.php';
                console.log('Sending to:', url);

                const submitButton = document.getElementById('submitSouvenirButton');
                const originalText = submitButton.innerHTML;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitButton.disabled = true;

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    console.log('Response headers:', response.headers);
                    return response.text().then(text => {
                        console.log('Raw response:', text);
                        try {
                            return JSON.parse(text);
                        } catch (e) {
                            console.error('JSON parse error:', e);
                            throw new Error('Invalid JSON response: ' + text.substring(0, 200));
                        }
                    });
                })
                .then(data => {
                    console.log('Parsed data:', data);
                    if (data.status === 'success') {
                        alert(isEditSouvenirMode ? 'Souvenir berhasil diupdate!' : 'Souvenir berhasil ditambahkan!');
                        closeSouvenirModal();
                        location.reload();
                    } else {
                        alert('Error: ' + (data.message || 'Unknown error'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan: ' + error.message);
                })
                .finally(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                });
            });

            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) {
                    closeSouvenirModal();
                }
            });
            document.getElementById('souvenirPrice').addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^\d]/g, '');
                e.target.value = value;
            });
        });


        var navLinks = document.getElementById("navLinks");
        function showMenu() { navLinks.style.right = "0"; }
        function hideMenu() { navLinks.style.right = "-250px"; }

        
    </script>
</body>
</html>