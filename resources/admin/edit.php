<?php
include '../service/connect.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Update Foto (Opsional)
    if ($_FILES['photo']['name']) {
        $photo = $_FILES['photo']['name'];
        $target = 'uploads/' . $photo;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target);
        $stmt = $pdo->prepare("UPDATE product SET product_name = ?, description = ?, stok = ?, kategori = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $stok, $kategori, $photo, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE product SET product_name = ?, description = ?, stok = ?, kategori = ? WHERE id = ?");
        $stmt->execute([$name, $description, $stok, $kategori, $id]);
    }

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>

<body>
    <h1>Edit Produk</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" value="<?= $product['product_name']; ?>" required><br><br>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required><?= $product['description']; ?></textarea><br><br>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" value="<?= $product['stok']; ?>" required><br><br>

        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="ibu" <?= $product['kategori'] === 'ibu' ? 'selected' : ''; ?>>Ibu</option>
            <option value="anak" <?= $product['kategori'] === 'anak' ? 'selected' : ''; ?>>Anak</option>
            <option value="kecantikan" <?= $product['kategori'] === 'kecantikan' ? 'selected' : ''; ?>>kecantikan</option>
        </select><br><br>

        <label for="photo">Foto Produk (Biarkan kosong jika tidak diubah):</label><br>
        <?php if (!empty($product['image'])): ?>
            <img src="../public/uploads/<?= htmlspecialchars($product['image']); ?>" alt="Produk" style="max-width: 200px; display: block; margin-bottom: 10px;">
        <?php endif; ?>
        <input type="file" id="photo" name="photo"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>