<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photography Packages - Happy Valley Rinjani</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* CSS SAMA SEPERTI SEBELUMNYA (TIDAK PERLU DIUBAH) */
        .admin-controls { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; flex-wrap: wrap; gap: 15px; }
        .button-wrapper { display: flex; gap: 15px; align-items: center; }
        .add-button { background: linear-gradient(45deg, #4CAF50, #45a049); color: white; border: none; padding: 12px 25px; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3); }
        .add-button:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(76, 175, 80, 0.4); }
        .card { position: relative; border: 1px solid #e0e0e0; border-radius: 12px; overflow: hidden; background: white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: all 0.3s ease; margin-bottom: 25px; }
        .card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15); }
        .package-info { display: flex; gap: 10px; margin: 8px 0; }
        .package-type { background: #4CAF50; color: white; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; }
        .card-buttons { display: flex; gap: 10px; margin-top: 15px; }
        .edit-button, .delete-button { display: flex; align-items: center; gap: 8px; padding: 8px 16px; border: none; border-radius: 6px; cursor: pointer; font-weight: 600; transition: all 0.3s ease; font-size: 14px; }
        .edit-button { background: #FFC107; color: #333; }
        .edit-button:hover { background: #FFB300; }
        .delete-button { background: #f44336; color: white; }
        .delete-button:hover { background: #d32f2f; }
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); backdrop-filter: blur(5px); }
        .modal-content { background-color: #fefefe; margin: 5% auto; padding: 0; border-radius: 12px; width: 90%; max-width: 600px; box-shadow: 0 10px 50px rgba(0,0,0,0.3); animation: modalSlideIn 0.3s ease-out; }
        @keyframes modalSlideIn { from { opacity: 0; transform: translateY(-50px); } to { opacity: 1; transform: translateY(0); } }
        .modal-header { background: linear-gradient(135deg, #4CAF50, #45a049); color: white; padding: 20px 30px; border-radius: 12px 12px 0 0; }
        .modal-header h2 { margin: 0; font-size: 24px; }
        .modal-body { padding: 30px; max-height: 70vh; overflow-y: auto; }
        .modal-footer { padding: 20px 30px; background: #f8f9fa; border-radius: 0 0 12px 12px; display: flex; justify-content: flex-end; gap: 15px; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-weight: 600; color: #333; }
        input[type="text"], input[type="number"], input[type="file"], select, textarea { width: 100%; padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 14px; transition: border-color 0.3s ease; box-sizing: border-box; }
        input[type="text"]:focus, input[type="number"]:focus, select:focus, textarea:focus { outline: none; border-color: #4CAF50; }
        textarea { resize: vertical; min-height: 100px; }
        .btn-primary, .btn-secondary { padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; font-weight: 600; transition: all 0.3s ease; min-width: 100px; }
        .btn-primary { background: linear-gradient(45deg, #4CAF50, #45a049); color: white; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4); }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; }
        .no-packages { text-align: center; padding: 50px 20px; color: #666; font-size: 18px; }
        .no-packages i { font-size: 48px; margin-bottom: 20px; color: #ccc; }
    </style>
</head>
<body>
    
    <main>
        <div class="hero-section">
            <div class="overlay"></div>
            <h1>Photography Packages</h1>
            <p>Capture the beauty of nature and culture with our professional photography packages</p>
        </div>

        <div class="content-wrapper">
            <div class="admin-controls">
                <div class="button-wrapper">
                    <button class="add-button" id="addPhotographyBtn">
                        <i class="fas fa-plus"></i> Tambah Photography Package
                    </button>
                    <a href="index.php" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Package Utama
                    </a>
                </div>
            </div>

            <div id="photographyContainer">
                <?php
                include '../includes/db_connect.php';
                
                // Query Table Baru
                $sql = "SELECT * FROM photography_packages ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card" data-id="' . $row['id'] . '">';
                        echo '    <div class="card-image">';
                        echo '        <img src="' . $row['image'] . '" alt="' . $row['title'] . '" style="width: 100%; height: 200px; object-fit: cover;">';
                        echo '    </div>';
                        echo '    <div class="card-content" style="padding: 20px;">';
                        echo '        <div class="card-header">';
                        echo '            <h2 style="margin: 0 0 10px 0; color: #333;">' . $row['title'] . '</h2>';
                        echo '            <div class="package-info">';
                        echo '                <span class="package-type">' . $row['category'] . '</span>';
                        echo '            </div>';
                        echo '            <div class="info-item price" style="font-size: 20px; font-weight: bold; color: #4CAF50; margin: 10px 0;">' . $row['price'] . '</div>';
                        echo '        </div>';
                        echo '        <p class="description" style="color: #666; line-height: 1.6; margin: 15px 0;">' . $row['description'] . '</p>';
                        
                        // Bagian detail Duration, Photos, Level SUDAH DIHAPUS

                        echo '        <div class="card-buttons">';
                        echo '            <button class="edit-button" onclick="editPhotographyPackage(' . $row['id'] . ')"><i class="fas fa-edit"></i> EDIT</button>';
                        echo '            <button class="delete-button" onclick="deletePhotographyPackage(' . $row['id'] . ')"><i class="fas fa-trash"></i> DELETE</button>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="no-packages">';
                    echo '    <i class="fas fa-camera"></i>';
                    echo '    <p>Belum ada photography package. Klik "Tambah Photography Package" untuk menambahkan.</p>';
                    echo '</div>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <div id="photographyModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="photographyModalTitle">Tambah Photography Package</h2>
            </div>
            <form id="photographyForm" enctype="multipart/form-data">
                <input type="hidden" id="photoId" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category">Kategori *</label>
                        <select id="category" name="category" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Wildlife Photography">Wildlife Photography</option>
                            <option value="Human Interest Photography">Human Interest Photography</option>
                            <option value="Landscape Photography">Landscape Photography</option>
                            <option value="Portrait Photography">Portrait Photography</option>
                            <option value="Adventure Photography">Adventure Photography</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="photoTitle">Judul *</label>
                        <input type="text" id="photoTitle" name="title" placeholder="Masukkan judul package" required>
                    </div>

                    <div class="form-group">
                        <label for="photoDescription">Deskripsi *</label>
                        <textarea id="photoDescription" name="description" placeholder="Deskripsikan package photography..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="photoPrice">Harga *</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #666; font-weight: bold;">$</span>
                            <input type="text" id="photoPrice" name="price" placeholder="100.00" style="padding-left: 25px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photoImage">Foto Package *</label>
                        <input type="file" id="photoImage" name="image" accept="image/*" required>
                        <small style="color: #666; font-size: 12px;">Format: JPG, PNG, GIF. Max size: 2MB</small>
                        <div id="currentPhotoImage" style="display: none; margin-top: 10px;">
                            <p style="margin-bottom: 5px; font-weight: 600;">Gambar Saat Ini:</p>
                            <img id="currentPhotoImagePreview" src="" alt="Current Image" style="max-width: 200px; border-radius: 8px; border: 2px solid #e0e0e0;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closePhotographyModal()">Batalkan</button>
                    <button type="submit" class="btn-primary" id="submitPhotoButton">
                        <i class="fas fa-save"></i> Simpan Package
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let isEditPhotoMode = false;

        function openPhotographyModal(editData = null) {
            isEditPhotoMode = editData !== null;
            const modal = document.getElementById('photographyModal');
            const title = document.getElementById('photographyModalTitle');
            const submitButton = document.getElementById('submitPhotoButton');
            
            if (isEditPhotoMode) {
                title.textContent = 'Edit Photography Package';
                submitButton.innerHTML = '<i class="fas fa-save"></i> Update Package';
                
                document.getElementById('photoId').value = editData.id;
                document.getElementById('category').value = editData.category;
                document.getElementById('photoTitle').value = editData.title;
                document.getElementById('photoDescription').value = editData.description;
                // Pengisian nilai duration, photos_included, level dihapus

                const price = editData.price.replace('$', '');
                document.getElementById('photoPrice').value = price;

                if (editData.image) {
                    document.getElementById('currentPhotoImage').style.display = 'block';
                    document.getElementById('currentPhotoImagePreview').src = editData.image;
                    document.getElementById('photoImage').required = false;
                }
            } else {
                title.textContent = 'Tambah Photography Package';
                submitButton.innerHTML = '<i class="fas fa-save"></i> Simpan Package';
                document.getElementById('photographyForm').reset();
                document.getElementById('currentPhotoImage').style.display = 'none';
                document.getElementById('photoImage').required = true;
            }
            
            modal.style.display = 'block';
        }

        function closePhotographyModal() {
            document.getElementById('photographyModal').style.display = 'none';
            isEditPhotoMode = false;
        }

        function editPhotographyPackage(id) {
            fetch('../api/get_photography_package.php?id=' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        openPhotographyModal(data);
                    } else {
                        alert('Gagal mengambil data package: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data package');
                });
        }

        function deletePhotographyPackage(id) {
            if (!id || id <= 0) return;
            if (!confirm('Apakah Anda yakin ingin menghapus package photography ini?')) return;

            const deleteButton = document.querySelector(`[onclick="deletePhotographyPackage(${id})"]`);
            if (deleteButton) {
                deleteButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
                deleteButton.disabled = true;
            }

            fetch('actions/delete_photography_package.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + encodeURIComponent(id)
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    location.reload();
                } else {
                    alert('Gagal menghapus: ' + data);
                    location.reload();
                }
            })
            .catch(error => {
                alert('Terjadi kesalahan: ' + error.message);
                location.reload();
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addPhotographyBtn').addEventListener('click', () => openPhotographyModal());

            document.getElementById('photographyForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const price = document.getElementById('photoPrice').value;
                formData.append('price', `$${parseFloat(price).toFixed(2)}`);

                const url = isEditPhotoMode ? 'actions/update_photography_package.php' : 'actions/add_photography_package.php';
                const submitButton = document.getElementById('submitPhotoButton');
                const originalText = submitButton.innerHTML;
                
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitButton.disabled = true;

                fetch(url, { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(isEditPhotoMode ? 'Berhasil diupdate!' : 'Berhasil ditambahkan!');
                        closePhotographyModal();
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => alert('Terjadi kesalahan jaringan'))
                .finally(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                });
            });

            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) closePhotographyModal();
            });
        });


        var navLinks = document.getElementById("navLinks");
        function showMenu() { navLinks.style.right = "0"; }
        function hideMenu() { navLinks.style.right = "-250px"; }
        
    </script>
</body>
</html>