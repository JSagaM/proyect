<?php
    require_once './backend/database.php';
    
    /*if($_GET){
       
        // Reference: https://medoo.in/api/select
        // Note: don't delete the [>] 
        $item = $database->select("tb_destinations",[
            "[>]tb_us_states"=>["id_us_state" => "id_us_state"],
            "[>]tb_camping_categories"=>["id_camping_category" => "id_camping_category"]
        ],[
            "tb_destinations.id_destination",
            "tb_destinations.destination_lname",
            "tb_destinations.destination_description",
            "tb_destinations.destination_image",
            "tb_destinations.destination_price",
            "tb_us_states.us_state_name",
            "tb_us_states.us_state_code",
            "tb_camping_categories.camping_category_name",
            "tb_camping_categories.camping_category_description",
            "tb_camping_categories.camping_max_people"
        ],[
            "id_destination"=>$_GET["id"]
        ]);

        // Reference: https://medoo.in/api/select
        $tours = $database->select("tb_destination_activities","*");

        // Reference: https://medoo.in/api/select
        $amenities = $database->select("tb_destination_amenities","*");
    }*/
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
        <!-- destinations -->
        <section class="destinations-container booking-container">
            <img src="./imgs/icons/destinations.svg" alt="Explore Destinations & Activities">
            <h2 class="destinations-title">Book Online</h2>
            <div class="activities-container">
          
                <?php
                    echo "<section class='activity'>";
                        echo "<div class='dish-thumb'>";
                            echo "<img class='dish-image' src='./imgs/".$item[0]["destination_image"]."' alt='".$item[0]["destination_lname"]."'>";
                        echo "</div>";
                        echo "<h3 class='dish-title'>".$item[0]["destination_lname"].", ".$item[0]["us_state_name"]."</h3>";
                        echo "<p class='dish-category'>".$item[0]["camping_category_name"].": ".$item[0]["camping_category_description"]."</p>";
                        echo "<p class='dish-text'>".$item[0]["destination_description"]."</p>";
                        echo "<p class='dish-price'>$".$item[0]["destination_price"]."</p>";
                        
                        echo "<p class='dish-category'>Tours with seats available, reservations are the only way to ensure a spot on a tour.*</p>";
                        echo "<h3 class='dish-title'>Cancellation Terms</h3>";
                        echo "<ul class='terms'>"
                            ."<li>Under 'Cancellation policies', you can choose between a fully flexible or a customised policy - or apply different policies to different room types."
                            ."<li>With a fully flexible policy, your guests will only pay when they stay at your property, and can cancel free of charge during a time frame of your choice prior to check-in."
                            ."<li>With a customised policy, you can choose how long before check-in guests can cancel for free, and how much they'll be charged if they do cancel after that point. You can also set up a prepayment before check-in, and define how and when you'd like to receive that payment. On top of that, you can apply different policies to different room types."
                            ."<li>With pre-authorisation preferences, you can show guests whether you'll pre-authorise their card or not, as well as how much you'll pre-authorise and when. Pre-authorisation can be applied to specific policy types, too."
                            ."<li>With a deposit, you can make sure you're covered financially if a guest cancels a booking. If the guest does end up staying, you can give them back the money afterwards, or simply deduct it from the overall price of the reservation. Deposits are usually paid by bank transfer, so this is particularly useful if you aren't able to charge credit cards.";
                        echo "</ul>";
                    echo "</section>";
                    
                    //booking details
                    echo "<div class='activity'>";
                        echo "<form class='form-container' action='confirmation.php' method='post'>"
                            ."<h3 class='dish-title'>Days</h3>"
                            ."<hr>"
                            ."<div class='form-items'>"
                                ."<div>"
                                    ."<label class='form-label' for='checkin'>Check-In</label>"
                                ."</div>"
                                ."<div>"
                                    ."<input id='checkin' class='form-input' class='form-input' type='date' name='checkin' min='' max='2024-06-30'>"
                                ."</div>"
                            ."</div>"
                            ."<div class='form-items'>"
                                ."<div>"
                                    ."<label class='form-label' for='people'>Number of people</label>"
                                ."</div>"
                                ."<div>"
                                    ."<input id='people' class='form-input' type='number' name='people' min='1' max='".$item[0]["camping_max_people"]."' value='1'>"
                                ."</div>"
                            ."</div>"
                            ."<div class='form-items'>"
                                ."<div>"
                                    ."<label class='form-label' for='checkout'>Days to stay (min. 1)</label>"
                                ."</div>"
                                ."<div>"
                                    ."<input id='checkout' class='form-input' type='number' name='checkout' min='1' max='50' value='1'>"
                                ."</div>"
                            ."</div>";
                            echo "<p class='checkout'>Check out: <span id='day-out' class='price-small'></span></p>";
                            echo "<h3 class='dish-title'>Extras</h3>"
                            ."<hr>";
                            foreach($amenities as $index=>$amenity){
                                echo "<div class='form-items'>"
                                    ."<div>"
                                        ."<label class='form-label destination-extra' for='am".$index."'>".$amenity["destination_amenity"]."<span class='price-small'>($".$amenity["destination_amenity_price"].")</span></label>"
                                    ."</div>"
                                    ."<div>"
                                        ."<input id='am".$index."' data-index='".$index."' data-price='".$amenity["destination_amenity_price"]."' class='form-input' type='number' oninput='updateSubtotal(this)' name='extras[]' step='1' value='0' min='0' max='50'>"
                                    ."</div>"
                                    ."<div>"
                                        ."<p id='amenity".$index."'>$0</p>"
                                    ."</div>"
                                ."</div>";
                            }
                            echo "<h3 class='dish-title'>Tours</h3>"
                            ."<hr>";
                            foreach($tours as $index=>$tour){
                                echo "<div class='form-items'>"
                                    ."<div>"
                                        ."<label class='form-label destination-extra' for='".$tour["destination_activity_name"]."'>".$tour["destination_activity_name"]."<span class='price-small'>($".$tour["destination_activity_price"].")</span></label>"
                                    ."</div>"
                                    ."<div>"
                                        ."<input id='tr".$index."' data-index='".$index."' data-price='".$tour["destination_activity_price"]."' class='form-input' type='number' oninput='updateToursTotal(this)' name='tours[]' min='0' max='".$item[0]["camping_max_people"]."' step='1' value='0'>"
                                    ."</div>"
                                    ."<div>"
                                        ."<p id='tour".$index."'>$0</p>"
                                    ."</div>"
                                ."</div>";
                            }
                            echo "<input type='hidden' name='id_destination' value='".$item[0]["id_destination"]."'>";
                            echo "<input type='hidden' id='destination_price' value='".$item[0]["destination_price"]."'>";
                            echo "<input type='hidden' id='confirmed_day_out' value='' name='date-out'>";
                            echo "<input type='submit' class='btn read-btn booking-btn' value='Book Now'>";
                        echo "</form>";
                        echo "<h3 class='dish-title'>Total: $<span id='total'></span></h3>";
                    echo "</div>"
                ?>
            </div>
        </section>
        <!-- destinations -->
    </main>
    <!-- End Main -->

    <!-- Footer START -->
    <?php 
        include "./parts/footer.php";
    ?>
    <!-- Footer END-->
</body>
</html>

