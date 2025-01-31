<?php
require 'service/connect.php';

$query = $pdo->query("SELECT product_name, price, image, kategori FROM product ORDER BY RAND() LIMIT 6");
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
    <div class="flex flex-wrap justify-center items-center gap-6">
        <?php foreach ($products as $product): ?>
            <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 rounded-lg w-96">
                <div class="relative h-56 m-2.5 overflow-hidden text-white rounded-md">
                    <img src="public/uploads/<?= htmlspecialchars($product['image']) ?>" alt="card-image" class="w-full h-full object-cover" />
                </div>
                <div class="pt-4 pl-8">
                    <h6 class="mb-2 text-blue-950 text-xl font-bold pb-4">
                        <?= htmlspecialchars($product['product_name']) ?>
                    </h6>
                </div>
                <div class="pl-8 flex flex-col gap-3">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_1_5122)">
                                <path d="M10 0L13.09 6.26L20 7.27L15 12.14L16.18 19.02L10 15.77L3.82 19.02L5 12.14L0 7.27L6.91 6.26L10 0Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_1_5122">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-sm text-gray-400 font-semibold pl-2">4.6</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M21 15.9999V7.9999C20.9996 7.64918 20.9071 7.30471 20.7315 7.00106C20.556 6.69742 20.3037 6.44526 20 6.2699L13 2.2699C12.696 2.09437 12.3511 2.00195 12 2.00195C11.6489 2.00195 11.304 2.09437 11 2.2699L4 6.2699C3.69626 6.44526 3.44398 6.69742 3.26846 7.00106C3.09294 7.30471 3.00036 7.64918 3 7.9999V15.9999C3.00036 16.3506 3.09294 16.6951 3.26846 16.9987C3.44398 17.3024 3.69626 17.5545 4 17.7299L11 21.7299C11.304 21.9054 11.6489 21.9979 12 21.9979C12.3511 21.9979 12.696 21.9054 13 21.7299L20 17.7299C20.3037 17.5545 20.556 17.3024 20.7315 16.9987C20.9071 16.6951 20.9996 16.3506 21 15.9999Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M3.27002 6.95996L12 12.01L20.73 6.95996" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 22.08V12" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-sm text-gray-400 font-semibold pl-2">4.6</p>
                    </div>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path d="M10.1816 3.38965H3.18164V10.3896H10.1816V3.38965Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.1816 3.38965H14.1816V10.3896H21.1816V3.38965Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21.1816 14.3896H14.1816V21.3896H21.1816V14.3896Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10.1816 14.3896H3.18164V21.3896H10.1816V14.3896Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-sm text-gray-400 font-semibold pl-2"><?= htmlspecialchars($product['kategori']) ?></p>
                    </div>
                </div>
                <p class="p-8"><?= htmlspecialchars($product['price']) ?></p>
                <div class="absolute bottom-8 right-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" viewBox="0 0 66 66" fill="none">
                        <g clip-path="url(#clip0_1_5125)">
                            <path d="M49.1431 66.7861L31.6431 53.0361L14.1431 66.7861V22.7861C14.1431 21.3274 14.6699 19.9285 15.6075 18.897C16.5452 17.8656 17.817 17.2861 19.1431 17.2861H44.1431C45.4691 17.2861 46.7409 17.8656 47.6786 18.897C48.6163 19.9285 49.1431 21.3274 49.1431 22.7861V66.7861Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </g>
                        <defs>
                            <clipPath id="clip0_1_5125">
                                <rect width="66" height="66" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        <?php endforeach; ?>
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