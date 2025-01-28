<?php
require '../auth/auth_role.php';
require '../service/connect.php';

checkRole('admin');

$query = $pdo->query("SELECT * FROM product");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php include '../components/header.php' ?>
    <h1>Product List</h1>
    <a href="create.php">Add Product</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Stock</th>
            <th>Category</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['id'] ?></td>
                <td><?= htmlspecialchars($product['product_name']) ?></td>
                <td><?= htmlspecialchars($product['description']) ?></td>
                <td><?= $product['stok'] ?></td>
                <td><?= $product['kategori'] ?></td>
                <td><img src="../public/uploads/<?= htmlspecialchars($product['image']) ?>" alt="Photo" width="50"></td>
                <td>
                    <a href="edit.php?id=<?= $product['id'] ?>">Edit</a>
                    <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h1>ADMIN</h1>
    <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>