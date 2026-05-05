<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori - UTS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <?php
    require_once 'config/database.php';
    
    $errors = [];
    $kode = $nama = $deskripsi = '';
    $status = 'Aktif';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kode = trim($_POST['kode_kategori']);
        $nama = trim($_POST['nama_kategori']);
        $deskripsi = trim($_POST['deskripsi']);
        $status = $_POST['status'];
        
        // Validasi
        if (empty($kode)) {
            $errors[] = 'Kode kategori harus diisi';
        } elseif (strlen($kode) > 10) {
            $errors[] = 'Kode kategori maksimal 10 karakter';
        } else {
            // Cek unik kode
            $stmt = $conn->prepare("SELECT id_kategori FROM kategori WHERE kode_kategori = ?");
            $stmt->bind_param("s", $kode);
            $stmt->execute();
            if ($stmt->get_result()->num_rows > 0) {
                $errors[] = 'Kode kategori sudah ada';
            }
            $stmt->close();
        }
        
        if (empty($nama)) {
            $errors[] = 'Nama kategori harus diisi';
        } elseif (strlen($nama) > 50) {
            $errors[] = 'Nama kategori maksimal 50 karakter';
        }
        
        if (strlen($deskripsi) > 255) {
            $errors[] = 'Deskripsi maksimal 255 karakter';
        }
        
        if (!in_array($status, ['Aktif', 'Nonaktif'])) {
            $errors[] = 'Status tidak valid';
        }
        
        if (empty($errors)) {
            // Insert
            $stmt = $conn->prepare("INSERT INTO kategori (kode_kategori, nama_kategori, deskripsi, status) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $kode, $nama, $deskripsi, $status);
            if ($stmt->execute()) {
                header("Location: index.php?message=Kategori berhasil ditambahkan");
                exit;
            } else {
                $errors[] = 'Gagal menambah kategori: ' . $conn->error;
            }
            $stmt->close();
        }
    }
    ?>
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Tambah Kategori Buku</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?php echo htmlspecialchars($error); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label for="kode_kategori" class="form-label">Kode Kategori *</label>
                                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" value="<?php echo htmlspecialchars($kode); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori *</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo htmlspecialchars($nama); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?php echo htmlspecialchars($deskripsi); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="aktif" value="Aktif" <?php echo ($status == 'Aktif') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="aktif">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="nonaktif" value="Nonaktif" <?php echo ($status == 'Nonaktif') ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="nonaktif">Nonaktif</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>