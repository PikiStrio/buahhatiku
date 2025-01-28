<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="src/output.css" rel="stylesheet">
    <title>Barang Favorite</title>
</head>

<body>
    <?php include 'components/header.php'; ?>

    <div class="w-full min-h-max bg-cover lg:bg-center bg-no-repeat"
        style="background-image: url('public/img/Rectangle81.png');">
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

    <h1 class="flex justify-center pt-10 pb-5 font-extrabold text-blue-950">KATEGORI</h1>
    <div class="flex justify-evenly">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
            <?php
            $img = ['4', ''];
            for ($i = 0; $i <= 2; $i++) {
                echo '
                <div class="relative h-full overflow-hidden text-white rounded-md py-5">
                    <img class="w-full h-auto rounded-md" src="public/img/4.png" alt="card-image" />
                    <div class="absolute flex top-7 justify-center inset-0">
                        <h1 class="text-black text-lg font-bold">ASfdas</h1>
                    </div>
                </div> 
            ';
            }
            ?>
        </div>
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