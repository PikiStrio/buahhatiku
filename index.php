<?php
require 'service/connect.php';

$query = $pdo->query("SELECT * FROM product");
$products = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="src/output.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="overflow-x-hidden">
    <!-- Header -->
    <?php include 'components/header.php'; ?>
    <!-- Background Image Section -->
    <div class="w-full min-h-max bg-cover lg:bg-center bg-no-repeat"
        style="background-image: url('public/img/Rectangle8.png');">
        <div class="flex flex-col lg:justify-center text-center text-white px-4 h-full">
            <div class="lg:my-36 my-20">
                <h1 class="text-2xl md:text-6xl lg:text-8xl font-extrabold opacity-20">
                    BUAHHATIKU
                </h1>
                <h2 class="text-xl md:text-4xl lg:text-6xl font-bold">
                    Buahhatiku
                </h2>
                <p class="text-xs md:text-sm lg:text-lg">Solusi Terbaik untuk Jasa Titip Produk Ibu, Anak, dan Kecantikan <br> Belanja Mudah dan Terpercaya untuk Kebutuhan Anda!</p>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <h1 class="text-center font-bold my-10">BARANG BARANG TERLARIS</h1>
    <div class="cotainer mx-2">
        <div class="flex justify-evenly">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo '
        <a class="max-w-xs overflow-hidden rounded-2xl group">
            <img class="transition-transform group-hover:scale-110 duration-200" src="https://docs.material-tailwind.com/img/team-3.jpg" alt="profile-picture" />
        </a>
        ';
            }
            ?>
        </div>
        <div class="flex justify-center my-10">
            <a href="" class="bg-blue-500 my-10 rounded-md p-3 text-md text-white hover:text-gray-200">lihat selengkapnya</a>
        </div>
    </div>
    <h1 class="text-center mt-5">PROMO</h1>
    <div class="container mx-2">
        <div class="flex justify-evenly">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo '
            
        <a class="max-w-xs overflow-hidden rounded-2xl group">
            <img src="public/img/Rectangle8.png" class="transition-transform group-hover:scale-110 duration-200" alt="PROMO">
        </a>
            ';
            }
            ?>
        </div>
    </div>
    <h1 class="text-center mt-5">Kategori</h1>
    <div class="container mx-2">
        <div class="flex justify-evenly">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo '
            
        <a class="max-w-xs overflow-hidden rounded-2xl group" href="">
            <img src="public/img/Rectangle8.png" class="transition-transform group-hover:scale-110 duration-200" alt="PROMO">
        </a>
            ';
            }
            ?>
        </div>
    </div>
    <h1 class="text-center mt-5">Rekomendasi untukmu</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="public/uploads/<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['product_name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($product['description']) ?></p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="d-flex justify-content-center mt-5 mb-5">
        <a href="" class="btn btn-primary">lihat selengkapnya</a>
    </div>

    <?php include 'components/footer.php'; ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var prevScrollpos = window.pageYOffset;
            var isScrolling;
            var navbar = document.getElementById("navbar");

            navbar.style.position = "fixed";

            window.onscroll = function() {
                var currentScrollPos = window.pageYOffset;


                window.clearTimeout(isScrolling);


                if (prevScrollpos < currentScrollPos && currentScrollPos > 0) {
                    navbar.style.top = "-100px";
                }

                isScrolling = setTimeout(function() {
                    navbar.style.top = "0";
                }, 500);

                prevScrollpos = currentScrollPos;
            };
        });
    </script>

</body>

</html>