<?php
require '../../auth/auth_role.php';
require '../../service/connect.php';

checkRole('admin');

$query = $pdo->query("SELECT * FROM product");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../src/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <!-- Judul dan Tombol Tambah Produk -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-blue-900">Product List</h1>
            <a href="create.php" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Add Product</a>
        </div>

        <!-- Tabel Produk -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-blue-100">
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">ID</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Name</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Description</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Stock</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Category</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Photo</th>
                        <th class="px-4 py-2 border border-gray-300 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border border-gray-300 text-gray-700"><?= $product['id'] ?></td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-700"><?= htmlspecialchars($product['product_name']) ?></td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-700"><?= htmlspecialchars($product['description']) ?></td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-700"><?= $product['stok'] ?></td>
                            <td class="px-4 py-2 border border-gray-300 text-gray-700"><?= $product['kategori'] ?></td>
                            <td class="px-4 py-2 border border-gray-300">
                                <img src="../../public/uploads/<?= htmlspecialchars($product['image']) ?>" alt="Photo" class="w-12 h-12 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <div class="flex space-x-2">
                                    <a href="edit.php?id=<?= $product['id'] ?>" class="px-3 py-1 bg-yellow-400 text-white rounded-md hover:bg-yellow-500">Edit</a>
                                    <a href="delete.php?id=<?= $product['id'] ?>" onclick="return confirm('Are you sure?')" class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">Delete</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Admin Logout -->
        <div class="mt-6">
            <h1 class="text-2xl font-bold text-blue-900">ADMIN</h1>
            <a href="../../auth/logout.php" class="inline-block px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Logout</a>
        </div>
    </div>
</body>

</html>