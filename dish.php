<?php
    require_once './backend/database.php';

    $lang = "AR";
    $url_params = "";
    
    if($_GET){
        if(isset($_GET["lang"]) && $_GET["lang"] == "ar"){
            $item = $database->select("tb_menu",[
                "[>]tb_menu_amount"=>["id_menu_amount" => "id_menu_amount"],
                "[>]tb_menu_category"=>["id_menu_category" => "id_menu_category"],
                "[>]tb_menu_type"=>["id_menu_type" => "id_menu_type"]
            ],[
                "tb_menu.id_menu",
                "tb_menu.menu_name_ar",
                "tb_menu.menu_description_ar",
                "tb_menu.menu_image",
                "tb_menu.menu_price",
                "tb_menu_amount.amount_name",
                "tb_menu_category.category_name",
                "tb_menu_type.type_name",
            ],[
                "id_menu"=>$_GET["id"]
            ]);
            //references
            $item[0]["menu_name"] = $item[0]["menu_name_ar"];
            $item[0]["menu_description"] = $item[0]
            ["menu_description_ar"];
            $lang = "EN";
            $url_params = "?id=".$item[0]["id_menu"]."&lang=EN";
            }else{
        $item = $database->select("tb_menu",[
            "[>]tb_menu_amount"=>["id_menu_amount" => "id_menu_amount"],
            "[>]tb_menu_category"=>["id_menu_category" => "id_menu_category"],
            "[>]tb_menu_type"=>["id_menu_type" => "id_menu_type"]
        ],[
            "tb_menu.id_menu",
            "tb_menu.menu_name",
            "tb_menu.menu_name_ar",
            "tb_menu.menu_description",
            "tb_menu.menu_description_ar",
            "tb_menu.menu_image",
            "tb_menu.menu_price",
            "tb_menu_amount.amount_name",
            "tb_menu_category.category_name",
            "tb_menu_type.type_name",
        ],[
            "id_menu"=>$_GET["id"]
        ]);
        $lang = "AR";
        $url_params = "?id=".$item[0]["id_menu"]."&lang=ar";
    }
        // Reference: https://medoo.in/api/select
        //$related_food = $database->select("tb_menu","menu_related");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish</title>
    <!-- Google Fonts START-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=El+Messiri&family=Nunito&family=Taviraj&display=swap" rel="stylesheet">
    <!-- Google Fonts END-->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <?php 
        include "./parts/header.php";
    ?>
    <main>
        <!-- Dish -->
        <section class="dish-container">
            <h2 class="featured featured-title" id="entrée">Dish description</h2>
            <div class="menu-container">
          
                <?php
                    echo "<section class='menu'>";
                        echo "<div class='dish_thumb'>";
                            echo "<img class='dish-image' src='./imgs/".$item[0]["menu_image"]."' alt='".$item[0]["menu_name"]."'>";
                            echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                            echo "<span class='dish_price'>$".$item[0]["menu_price"]."</span>";
                        echo "</div>".
                        "<a href='dish.php".$url_params."'>".$lang."</a>";
                        echo "<h3 class='dish_title'>".$item[0]["menu_name"]."</h3>";
                        echo "<p class='dish-category'>".$item[0]["category_name"].", ".$item[0]["amount_name"]."</p>";
                        echo "<p class='dish-text'>".$item[0]["menu_description"]."</p>";
                        /*echo "<p class='dish-text'>Some related dishes to ".
                        $item[0]["menu_name"]
                        ." were selected for you:</p>";
                        echo "<ul class='dish-related'>";
                            foreach($related_food as $related){
                                echo "<li>".$related["menu_name"]."</li>";
                            }
                        echo "</ul>";
                        echo "<p class='dish-category'>Related dishes are based on what you are watching.*</p>";*/
                        echo "<a class='btn read-btn' href='book.php?id=".$item[0]["id_menu"]."'>Order</a>";
                    echo "</section>";
                ?>
            </div>
        </section>
        <!-- Dish -->
    </main>
    <?php 
        include "./parts/footer.php";
    ?>
</body>
</html>