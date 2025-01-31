<?php
include '../../service/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user']['id'];
    echo $user_id;
    $name = $_POST['name'];
    $description = $_POST['description'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];

    // Upload Foto
    $photo = $_FILES['photo']['name'];
    $target = '../../public/uploads/' . $photo;
    move_uploaded_file($_FILES['photo']['tmp_name'], $target);

    // Insert data
    $stmt = $pdo->prepare("INSERT INTO product (product_name, description, stok, kategori, image, user_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $description, $stok, $kategori, $photo, $user_id]);

    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>

<body>
    <h1>Tambah Produk</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required><br><br>

        <label for="kategori">Kategori:</label>
        <select id="kategori" name="kategori" required>
            <option value="ibu">Ibu</option>
            <option value="anak">Anak</option>
            <option value="kecantikan">Kecantikan</option>
        </select><br><br>

        <label for="photo">Foto Produk:</label>
        <input type="file" id="photo" name="photo" required><br><br>

        <button type="submit">Tambah</button>
    </form>
</body>

</html>