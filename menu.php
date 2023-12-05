<?php
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/select
    $categories = $database->select("tb_menu_category","*");    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu</title>
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
    <!-- Menu options START -->
    <?php
      include "./parts/menu_options.php";
    ?>
    <!-- Menu options END -->

    <!-- Menu START -->
    <section class="dish-container">
      <?php
        foreach($categories as $category){
          echo "<h2 class='featured-title'>".$category["category_name"]."</h2>";
          echo "<div class='menu-container'>";
          
            $items = $database->select("tb_menu",[
              "[>]tb_menu_category"=>["id_menu_category" => "id_menu_category"],              
              "[>]tb_menu_amount"=>["id_menu_amount" => "id_menu_amount"],              
              "[>]tb_menu_type"=>["id_menu_type" => "id_menu_type"]
            ],[
              "tb_menu.id_menu",
              "tb_menu.menu_name",
              "tb_menu.menu_description",
              "tb_menu.menu_image",
              "tb_menu.menu_price",
              "tb_menu_amount.amount_name",
              "tb_menu_category.category_name",
              "tb_menu_type.type_name",
            ],[
              "tb_menu.id_menu_category"=>$category["id_menu_category"]
            ]);

            foreach($items as $item){
              echo "<section class='menu'>";
                echo "<div class='dish-thumb'>";
                  echo "<img class='dish-image' src='./imgs/".$item["menu_image"]."' alt='".$item["menu_name"]."'>";
                  echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                  echo "<span class='dish-price'>$".$item["menu_price"]."</span>";
                echo "</div>";
                echo "<h3 class='dish-title'>".$item["menu_name"]."</h3>";
                echo "<p class='dish-text'>".substr($item["menu_description"], 0, 70)."...</p>";
                echo "<a class='btn read-btn' href='dish.php?id=".$item["id_menu"]."'>View Details</a>";
              echo "</section>";
            }
          echo "</div>";
          echo "<div class='cta-container'>";
            echo "<a class='btn nav-list-link' href='#menu_top'>Go up</a>";
          echo "</div>";
        }
      ?>
    </section>
    <!-- Menu END -->

    <!-- Footer START -->
    <?php 
        include "./parts/footer.php";
    ?>
    <!-- Footer END-->
  </main>
  <!-- Main END -->
</body>
</html>