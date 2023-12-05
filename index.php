<?php
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_menu","*");    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Lebanese Restaurant</title>
        <!-- Google Fonts START-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=El+Messiri&family=Nunito&family=Taviraj&display=swap" rel="stylesheet">
        <!-- Google Fonts END-->
        <link rel="stylesheet" href="./css/main.css" />
    </head>

    <body>
        <!-- Header START -->
        <?php 
            include "./parts/header.php";
        ?>
        <!-- Header END -->

        <!-- Main START -->
        <main>
            <!-- Featured START -->
            <section>
                <div class="dish-container">
                    <section class="dish-description">
                        <h1 class="main-title">Kibbeh</h1>
                        <p class="featured-text">Kibbeh is a popular middle eastern dish with a myriad of variations that combine ground meat and bulgur wheat. There are two specific parts to kibbeh, an outside shell, and an inside filling. Kibbeh is the national dish of both Syria and Lebanon.</p>
                    </section>
                    <section class="featured-image">
                        <img class="featured-dish" src="./imgs/dish-kibbeh.jpg" alt="Kibbeh, National dish">
                    </section>                
                </div>
                <div class="cta-container">
                    <a class="btn nav-list-link" href="#">Order</a>
                </div>
            </section>
            <!-- Featured END -->

            <!-- ***** MODIFICAR SLIDER ***** -->
            <h2 class="featured hero-title">Featured</h2>
            <!-- Slider START -->
            <?php
                //include "./parts/slider.php";
            ?>
            <!-- Slider END -->
        </main>
        <!-- End Main -->

        <!-- Footer START -->
        <?php 
            include "./parts/footer.php";
        ?>
        <!-- Footer END-->
    </body>
</html>