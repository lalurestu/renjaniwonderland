<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Valley Rinjani - Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
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

        .filter-wrapper {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .filter-select {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            font-size: 14px;
            min-width: 150px;
            transition: border-color 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #4CAF50;
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

        .form-row {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .hyphen {
            font-weight: bold;
            color: #666;
        }

        .minute-text {
            color: #666;
            font-size: 14px;
        }

        .checkbox-group {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            cursor: pointer;
        }

        .price-input-wrapper {
            position: relative;
        }

        .price-input-wrapper::before {
            content: '$';
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            font-weight: bold;
        }

        .price-input-wrapper input {
            padding-left: 25px;
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

        .conditional-field {
            transition: all 0.3s ease;
        }

        .conditional-field.hidden {
            display: none;
        }

        @media (max-width: 768px) {
            .admin-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .button-wrapper {
                justify-content: center;
            }

            .filter-wrapper {
                justify-content: center;
            }

            .form-row {
                flex-direction: column;
            }

            .modal-content {
                margin: 10% auto;
                width: 95%;
            }
        }
    </style>
</head>

<body>
    <?php
    include 'includes/db_connect.php';
    ?>

    <main>
        <div class="hero-section">
            <div class="overlay"></div>
            <h1>Admin Dashboard Package</h1>
            <p>Kelola semua paket destinasi, photography, dan souvenir dengan mudah</p>
        </div>

        <div class="content-wrapper">
            <div class="admin-controls">
                <div class="button-wrapper">
                    <button class="add-button" id="addDestinationBtn">
                        <i class="fas fa-plus"></i> Tambah Destinasi
                    </button>
                    <a href="photography.php" class="btn-secondary">
                        <i class="fas fa-camera"></i> Kelola Photography
                    </a>
                    <a href="souvenir.php" class="btn-secondary">
                        <i class="fas fa-gift"></i> Kelola Souvenir
                    </a>
                </div>
                
                <div class="filter-wrapper">
                    <select id="packageTypeFilter" class="filter-select">
                        <option value="">Semua Package</option>
                        <option value="mount">Mount</option>
                        <option value="hills">Hills</option>
                        <option value="paragliding">Paragliding</option>
                    </select>
                    
                    <select id="difficultyFilter" class="filter-select">
                        <option value="">Semua Difficulty</option>
                        <option value="Easy">Easy</option>
                        <option value="Medium">Medium</option>
                        <option value="Hard">Hard</option>
                    </select>
                </div>
            </div>

            <div id="packagesContainer">
                <?php
                $sql = "SELECT * FROM packages ORDER BY created_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card" data-id="' . $row['id'] . '" data-type="' . $row['package_type'] . '" data-difficulty="' . $row['difficulty'] . '">';
                        echo '    <div class="card-image">';
                        echo '        <img src="' . $row['image'] . '" alt="Gambar ' . $row['title'] . '" style="width: 100%; height: 200px; object-fit: cover;">';
                        echo '    </div>';
                        echo '    <div class="card-content" style="padding: 20px;">';
                        echo '        <div class="card-header">';
                        echo '            <h2 style="margin: 0 0 10px 0; color: #333;">' . $row['title'] . '</h2>';
                        echo '            <div class="package-info">';
                        echo '                <span class="package-type">' . ucfirst($row['package_type']) . '</span>';
                        echo '            </div>';
                        echo '            <div class="info-item price" style="font-size: 20px; font-weight: bold; color: #4CAF50; margin: 10px 0;">' . $row['price'] . '</div>';
                        echo '        </div>';
                        echo '        <div class="info-row" style="margin: 10px 0;">';
                        echo '            <div class="info-item"><strong>Duration:</strong> <span>' . $row['duration'] . '</span></div>';
                        echo '        </div>';
                        echo '        <p class="description" style="color: #666; line-height: 1.6; margin: 15px 0;">' . $row['description'] . '</p>';
                        echo '        <div class="details" style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin: 15px 0;">';
                        
                        if ($row['package_type'] !== 'paragliding') {
                            echo '            <div class="detail-item" style="margin-bottom: 8px;"><strong>Destination:</strong> <span>' . $row['route'] . '</span></div>';
                        }
                        
                        echo '            <div class="detail-item" style="margin-bottom: 8px;"><strong>Difficult:</strong> <span>' . $row['difficulty'] . '</span></div>';
                        echo '            <div class="detail-item"><strong>Minimum Age:</strong> <span>' . $row['min_age'] . '</span></div>';
                        echo '        </div>';
                        echo '        <div class="card-buttons">';
                        echo '            <button class="edit-button" data-id="' . $row['id'] . '"><i class="fas fa-edit"></i> EDIT</button>';
                        echo '            <button class="delete-button" data-id="' . $row['id'] . '"><i class="fas fa-trash"></i> DELETE</button>';
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="no-packages">';
                    echo '    <i class="fas fa-box-open"></i>';
                    echo '    <p>Tidak ada paket yang tersedia. Klik "Tambah Destinasi" untuk menambahkan paket pertama.</p>';
                    echo '</div>';
                }

                $conn->close();
                ?>
            </div>
        </div>

        <!-- Modal Tambah/Edit Package -->
        <div id="packageModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 id="modalTitle">Tambah Package Baru</h2>
                </div>
                <form id="packageForm" enctype="multipart/form-data">
                    <input type="hidden" id="editId" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="package_type">Jenis Package *</label>
                            <select id="package_type" name="package_type" required onchange="toggleFields()">
                                <option value="">Pilih Jenis Package</option>
                                <option value="mount">Mount</option>
                                <option value="hills">Hills</option>
                                <option value="paragliding">Paragliding</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Judul Package *</label>
                            <input type="text" id="title" name="title" placeholder="Masukkan judul package" required>
                        </div>

                        <div class="form-group" id="durationMountHills">
                            <label for="duration">Duration *</label>
                            <div class="form-row">
                                <div class="form-group">
                                    <select id="hari" name="hari">
                                        <option value="">Hari</option>
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?> Hari</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="hyphen">-</div>
                                <div class="form-group">
                                    <select name="malam" id="malam">
                                        <option value="">Malam</option>
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?> Malam</option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group conditional-field hidden" id="durationParagliding">
                            <label for="duration_minutes">Duration (Menit) *</label>
                            <select id="duration_minutes" name="duration_minutes">
                                <option value="">Pilih Duration</option>
                                <option value="15">15 Menit</option>
                                <option value="30">30 Menit</option>
                                <option value="45">45 Menit</option>
                                <option value="60">60 Menit</option>
                                <option value="90">90 Menit</option>
                                <option value="120">120 Menit</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi *</label>
                            <textarea id="description" name="description" placeholder="Deskripsikan package secara detail..." required></textarea>
                        </div>

                        <div class="form-group conditional-field" id="routeField">
                            <label for="route">Destination *</label>
                            <input type="text" id="route" name="route" placeholder="e.g., Sembalun-Pelewangan">
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="min_age">Minimum Age *</label>
                                <input type="number" id="min_age" name="min_age" min="1" max="100" placeholder="18" required>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga *</label>
                                <div class="price-input-wrapper">
                                    <input type="text" id="harga" name="harga" placeholder="100.00" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Level Kesulitan *</label>
                            <div class="checkbox-group">
                                <label><input type="radio" name="difficulty" value="Easy" required> Easy</label>
                                <label><input type="radio" name="difficulty" value="Medium"> Medium</label>
                                <label><input type="radio" name="difficulty" value="Hard"> Hard</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Foto Package *</label>
                            <input type="file" id="image" name="image" accept="image/*" required>
                            <small style="color: #666; font-size: 12px;">Format: JPG, PNG, GIF. Max size: 2MB</small>
                            <div id="currentImage" style="display: none; margin-top: 10px;">
                                <p style="margin-bottom: 5px; font-weight: 600;">Gambar Saat Ini:</p>
                                <img id="currentImagePreview" src="" alt="Current Image" style="max-width: 200px; border-radius: 8px; border: 2px solid #e0e0e0;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-secondary" onclick="closePackageModal()">Batalkan</button>
                        <button type="submit" class="btn-primary" id="submitButton">
                            <i class="fas fa-save"></i> Simpan Package
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header" style="background: #f44336;">
                <h2>Konfirmasi Hapus</h2>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px; line-height: 1.6;">Apakah Anda yakin ingin menghapus package ini?</p>
                <p style="color: #666; font-size: 14px; margin-top: 10px;">Tindakan ini tidak dapat dibatalkan. Semua data package akan dihapus secara permanen dari sistem.</p>
            </div>
            <div class="modal-footer">
                <button class="btn-secondary" onclick="closeDeleteModal()">Batalkan</button>
                <button class="btn-primary" id="confirmDelete" style="background: #f44336;">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        let itemIdToDelete = null;
        let isEditMode = false;

        function toggleFields() {
            const packageType = document.getElementById('package_type').value;
            const routeField = document.getElementById('routeField');
            const durationMountHills = document.getElementById('durationMountHills');
            const durationParagliding = document.getElementById('durationParagliding');
            
            if (packageType === 'paragliding') {
                routeField.classList.add('hidden');
                durationMountHills.style.display = 'none';
                durationParagliding.classList.remove('hidden');
                document.getElementById('route').required = false;
            } else {
                routeField.classList.remove('hidden');
                durationMountHills.style.display = 'block';
                durationParagliding.classList.add('hidden');
                document.getElementById('route').required = true;
            }
        }

        function openAddModal() {
            isEditMode = false;
            document.getElementById("modalTitle").textContent = "Tambah Package Baru";
            document.getElementById("submitButton").innerHTML = '<i class="fas fa-save"></i> Simpan Package';
            document.getElementById("packageForm").reset();
            document.getElementById("currentImage").style.display = 'none';
            document.getElementById("image").required = true;
            toggleFields();
            document.getElementById("packageModal").style.display = "block";
        }

        function closePackageModal() {
            document.getElementById("packageModal").style.display = "none";
            isEditMode = false;
        }

        function openDeleteModal(itemId) {
            itemIdToDelete = itemId;
            document.getElementById("deleteModal").style.display = "block";
        }

        function closeDeleteModal() {
            document.getElementById("deleteModal").style.display = "none";
            itemIdToDelete = null;
        }

        function openEditModal(editData) {
            isEditMode = true;
            document.getElementById("modalTitle").textContent = "Edit Package";
            document.getElementById("submitButton").innerHTML = '<i class="fas fa-save"></i> Update Package';
            
            document.getElementById('editId').value = editData.id;
            document.getElementById('package_type').value = editData.package_type;
            document.getElementById('title').value = editData.title;
            
            if (editData.package_type === 'paragliding') {
                const minutes = editData.duration.split(' ')[0];
                document.getElementById('duration_minutes').value = minutes;
            } else {
                const durationParts = editData.duration.split(' - ');
                if (durationParts.length === 2) {
                    const hari = parseInt(durationParts[0].split(' ')[0]);
                    const malam = parseInt(durationParts[1].split(' ')[0]);
                    document.getElementById('hari').value = hari;
                    document.getElementById('malam').value = malam;
                }
            }
            
            document.getElementById('description').value = editData.description;
            document.getElementById('route').value = editData.route || '';
            
            const minAge = parseInt(editData.min_age.split(' ')[0]);
            document.getElementById('min_age').value = minAge;
            
            const price = editData.price.replace('$', '').replace(',', '');
            document.getElementById('harga').value = price;
            
            const difficulty = editData.difficulty.trim();
            document.querySelectorAll('input[name="difficulty"]').forEach(radio => {
                if (radio.value === difficulty) {
                    radio.checked = true;
                }
            });

            if (editData.image) {
                document.getElementById('currentImage').style.display = 'block';
                document.getElementById('currentImagePreview').src = editData.image;
                document.getElementById('image').required = false;
            }
            
            toggleFields();
            document.getElementById("packageModal").style.display = "block";
        }

        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('addDestinationBtn').addEventListener('click', openAddModal);

            const packageTypeFilter = document.getElementById('packageTypeFilter');
            const difficultyFilter = document.getElementById('difficultyFilter');

            function filterPackages() {
                const selectedType = packageTypeFilter.value;
                const selectedDifficulty = difficultyFilter.value;
                
                document.querySelectorAll('.card').forEach(card => {
                    const cardType = card.getAttribute('data-type');
                    const cardDifficulty = card.getAttribute('data-difficulty');
                    
                    const typeMatch = !selectedType || cardType === selectedType;
                    const difficultyMatch = !selectedDifficulty || cardDifficulty === selectedDifficulty;
                    
                    card.style.display = (typeMatch && difficultyMatch) ? 'block' : 'none';
                });
            }

            packageTypeFilter.addEventListener('change', filterPackages);
            difficultyFilter.addEventListener('change', filterPackages);

            document.addEventListener('click', (e) => {
                if (e.target.closest('.edit-button')) {
                    const card = e.target.closest('.card');
                    const editData = {
                        id: card.dataset.id,
                        package_type: card.dataset.type,
                        title: card.querySelector('h2').textContent,
                        duration: card.querySelector('.info-item span').textContent,
                        description: card.querySelector('.description').textContent,
                        route: card.querySelector('.detail-item:nth-child(1) span') ? card.querySelector('.detail-item:nth-child(1) span').textContent : '',
                        difficulty: card.querySelector('.detail-item:nth-child(2) span').textContent,
                        min_age: card.querySelector('.detail-item:last-child span').textContent,
                        price: card.querySelector('.price').textContent,
                        image: card.querySelector('img').src
                    };
                    openEditModal(editData);
                }
            });

            document.addEventListener('click', (e) => {
                if (e.target.closest('.delete-button')) {
                    const button = e.target.closest('.delete-button');
                    openDeleteModal(button.dataset.id);
                }
            });

            document.getElementById('confirmDelete').addEventListener('click', () => {
                if (itemIdToDelete) {
                    deleteItem(itemIdToDelete);
                }
            });

            document.getElementById('packageForm').addEventListener('submit', (e) => {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);

                const packageType = document.getElementById('package_type').value;
                const minAge = document.getElementById('min_age').value;
                const harga = document.getElementById('harga').value;

                if (!minAge || minAge < 1) {
                    alert('Harap masukkan minimum age yang valid.');
                    return;
                }

                if (!harga || isNaN(parseFloat(harga))) {
                    alert('Harap masukkan harga yang valid.');
                    return;
                }

                if (packageType === 'paragliding') {
                    const durationMinutes = document.getElementById('duration_minutes').value;
                    if (!durationMinutes) {
                        alert('Harap pilih duration untuk paragliding.');
                        return;
                    }
                    formData.append('duration', `${durationMinutes} Menit`);
                    formData.set('route', '');
                } else {
                    const hari = document.getElementById('hari').value;
                    const malam = document.getElementById('malam').value;
                    if (!hari || !malam) {
                        alert('Harap pilih duration yang valid untuk mount/hills.');
                        return;
                    }
                    formData.append('duration', `${hari} Hari - ${malam} Malam`);
                    
                    const route = document.getElementById('route').value;
                    if (!route) {
                        alert('Harap masukkan destination untuk mount/hills.');
                        return;
                    }
                }

                formData.append('min_age', `${minAge} Years Old`);
                formData.append('price', `$${parseFloat(harga).toFixed(2)}`);

                const url = isEditMode ? 'update_package.php' : 'add_package.php';

                const submitButton = document.getElementById('submitButton');
                const originalText = submitButton.innerHTML;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitButton.disabled = true;

                fetch(url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(isEditMode ? 'Package berhasil diupdate!' : 'Package berhasil ditambahkan!');
                        closePackageModal();
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan jaringan.');
                })
                .finally(() => {
                    submitButton.innerHTML = originalText;
                    submitButton.disabled = false;
                });
            });

            window.addEventListener('click', (e) => {
                if (e.target.classList.contains('modal')) {
                    closePackageModal();
                    closeDeleteModal();
                }
            });
        });

        function deleteItem(itemId) {
            const deleteButton = document.getElementById('confirmDelete');
            const originalText = deleteButton.innerHTML;
            deleteButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menghapus...';
            deleteButton.disabled = true;

            fetch('delete_package.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + itemId
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "success") {
                    const cardToDelete = document.querySelector(`.card[data-id="${itemId}"]`);
                    if (cardToDelete) cardToDelete.remove();
                    closeDeleteModal();
                    alert("Package berhasil dihapus!");
                } else {
                    alert("Gagal menghapus package.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Terjadi kesalahan saat menghapus package.");
            })
            .finally(() => {
                deleteButton.innerHTML = originalText;
                deleteButton.disabled = false;
            });
        }

        document.getElementById('harga').addEventListener('input', function(e) {
            let value = e.target.value.replace(/[^\d.]/g, '');
            let decimalCount = (value.match(/\./g) || []).length;
            
            if (decimalCount > 1) {
                value = value.substring(0, value.lastIndexOf('.'));
            }
            
            e.target.value = value;
        });
    </script>
</body>
</html>