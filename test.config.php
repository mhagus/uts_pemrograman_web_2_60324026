<?php
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Koneksi Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Test Koneksi Database</h4>
            </div>
            <div class="card-body">
                <?php
                // cek koneksi
                 if ($conn) {
                    echo '<div class="alert alert-success">';
                    echo '<h5><i class="bi bi-check-circle"></i> Koneksi Berhasil!</h5>';
                    echo '<p><strong>Server:</strong> ' . DB_SERVER . '</p>';
                    echo '<p><strong>Database:</strong> ' . DB_NAME . '</p>';
                    echo '<p><strong>Charset:</strong> ' . $conn->character_set_name() . '</p>';
                    echo '</div>';
                } else {
                    echo '<div class="alert alert-danger">';
                    echo '<h5>Koneksi Gagal</h5>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>