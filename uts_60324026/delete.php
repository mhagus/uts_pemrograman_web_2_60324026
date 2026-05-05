<?php
require_once 'config/database.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Hapus kategori
$stmt = $conn->prepare("DELETE FROM kategori WHERE id_kategori = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: index.php?message=Kategori berhasil dihapus");
} else {
    header("Location: index.php?message=Gagal menghapus kategori");
}
$stmt->close();
$conn->close();
?>