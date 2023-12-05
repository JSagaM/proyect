<?php
    require_once '../database.php';
    
    if($_POST){

        var_dump($_POST);
        
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
        ],[
            "id_destination"=>$_POST["id_destination"]
        ]);

        // Reference: https://medoo.in/api/select
        $tours = $database->select("tb_destination_activities","*");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping Website</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <header class="hero-container">
        <nav class="top-nav">
            <a href="#"><img src="./imgs/logo.svg" alt="Camping logo"></a>
            <!-- mobile nav btn -->
            <input class="mobile-check" type="checkbox">
            <label class="mobile-btn">
                <span></span>
            </label>
            <!-- mobile nav btn -->
            <ul class="nav-list">
                <li><a class="nav-list-link" href="#">Home</a></li>
                <li><a class="nav-list-link" href="#">Destination</a></li>
                <li><a class="nav-list-link" href="#">Near me</a></li>
                <li><a class="nav-list-link" href="#">Events</a></li>
                <li><a class="nav-list-link" href="#">Blog</a></li>
                <li><a class="nav-list-link" href="#">Gallery</a></li>
                <li><a class="nav-list-link" href="#">About</a></li>
                <li><a class="nav-list-link" href="#">Contact us</a></li>
            </ul>
        </nav>
        <h1 class="hero-title">Find Yourself Outside.</h1>
        <p class="hero-text">Book unique camping experiences on over 300,000 campsites, cabins, RV parks, public parks and more.</p>
        <div class="cta-container">
            <a class="btn nav-list-link" href="#">Discover</a>
        </div>
        
    </header>
    <main>
        <!-- activities -->
        <div class="activities-container">
            <section class="activity">
                <img class="activity-icon" src="./imgs/icons/fire.svg" alt="Camping & Day Use">
                <h3 class="activity-title">Camping & Day Use</h3>
                <p class="activity-text">Return to your favorite spot or discover a new one that's right for you.</p>
            </section>
            <section class="activity">
                <img class="activity-icon" src="./imgs/icons/tickets.svg" alt="Camping & Day Use">
                <h3 class="activity-title">Tours & Tickets</h3>
                <p class="activity-text">Reserve tours and tickets to participate in events.</p>
            </section>
            <section class="activity">
                <img class="activity-icon" src="./imgs/icons/permits.svg" alt="Camping & Day Use">
                <h3 class="activity-title">Permits</h3>
                <p class="activity-text">Obtain permits for access to high-demand locations.</p>
            </section>
            <section class="activity">
                <img class="activity-icon" src="./imgs/icons/activities.svg" alt="Camping & Day Use">
                <h3 class="activity-title">Recreation Activities</h3>
                <p class="activity-text">Find the best spots for hunting, fishing & recreational shooting.</p>
            </section>
        </div>
        <!-- activities -->

        <!-- destinations -->
        <section class="destinations-container">
            <img src="./imgs/icons/destinations.svg" alt="Explore Destinations & Activities">
            <h2 class="destinations-title">Explore Destinations & Activities</h2>
            <div class="activities-container">
          
                <?php
                    echo "<section class='activity'>";
                        echo "<div class='activity-thumb'>";
                            echo "<img class='activity-image' src='./imgs/".$item[0]["destination_image"]."' alt='".$item[0]["destination_lname"]."'>";
                            echo "<button class='like-btn'><img src='./imgs/icons/like.svg' alt='Like'></button>";
                            echo "<span class='activity-price'>$".$item[0]["destination_price"]."/night</span>";
                        echo "</div>";
                        echo "<h3 class='activity-title'>".$item[0]["destination_lname"].", ".$item[0]["us_state_name"]."</h3>";
                        echo "<p class='activity-category'>".$item[0]["camping_category_name"].": ".$item[0]["camping_category_description"]."</p>";
                        echo "<p class='activity-text'>".$item[0]["destination_description"]."</p>";
                        echo "<p class='activity-text'>People come to ".$item[0]["destination_lname"]." for it's beauty and tranquillity but many more want to find out more. We're listing our tours with seats currently available below:</p>";
                        echo "<ul class='activity-tours'>";
                            foreach($tours as $tour){
                                echo "<li>".$tour["destination_activity_name"]."</li>";
                            }
                        echo "</ul>";
                    echo "</section>";
                ?>
                
            </div>

        </section>
        <!-- destinations -->

        <!-- subscribe -->
        <div class="activities-container subscribe">
            <section class="in-touch">
                <h2 class="destinations-title margin-none subscribe-title">Let's Stay in Touch</h2>
                <p>Get travel planning ideas, helpful tips, and stories from our visitors delivered right to your inbox.</p>
                <form class="subscribe-form" action="">
                    <img src="./imgs/icons/email.svg" alt="email address">
                    <input class="email" type="text" placeholder="Email Address">
                    <input class="submit-btn" type="submit" value="">
                </form>
            </section>
            <div>
                <img class="subscribe-image" src="./imgs/camping-graphic.webp" alt="Let's Stay in Touch">
            </div>
        </div>
        <!-- subscribe -->

    </main>
    <footer class="footer-container">

        <div class="footer-content">
            <section>
                <h3>Hipcamp is everywhere you want to camp.</h3>
                <p>Discover unique experiences on ranches, nature preserves, farms, vineyards, and public campgrounds across the U.S. Book tent camping, treehouses, cabins, yurts, primitive backcountry sites, car camping, airstreams, tiny houses, RV camping, glamping tents and more.</p>
            </section>
            <div class="footer-links">
                <section>
                    <h3>Get to Know Us</h3>
                    <ul class="nav-bottom-list">
                        <li><a class="nav-bottom-link" href="#">About Us</a></li>
                        <li><a class="nav-bottom-link" href="#">Rules & Reservation Policies</a></li>
                        <li><a class="nav-bottom-link" href="#">Accessibility</a></li>
                        <li><a class="nav-bottom-link" href="#">Media Center</a></li>
                        <li><a class="nav-bottom-link" href="#">Site Map</a></li>
                    </ul>
                </section>
                <section>
                    <h3>Plan with Us</h3>
                    <ul class="nav-bottom-list">
                        <li><a class="nav-bottom-link" href="#">Find Trip Inspiration</a></li>
                        <li><a class="nav-bottom-link" href="#">Build a Trip</a></li>
                        <li><a class="nav-bottom-link" href="#">Accessibility</a></li>
                        <li><a class="nav-bottom-link" href="#">Buy a Pass</a></li>
                        <li><a class="nav-bottom-link" href="#">Enter a Lottery</a></li>
                    </ul>
                </section>
                <section>
                    <h3>Let Us Help You</h3>
                    <ul class="nav-bottom-list">
                        <li><a class="nav-bottom-link" href="#">Your Account</a></li>
                        <li><a class="nav-bottom-link" href="#">Your Reservations</a></li>
                        <li><a class="nav-bottom-link" href="#">Contact Us</a></li>
                        <li><a class="nav-bottom-link" href="#">Help Center</a></li>
                        <li><a class="nav-bottom-link" href="#">Submit Feedback</a></li>
                    </ul>
                </section>
            </div>
        </div>
        <section class="download-app">
            <h3>Download our App</h3>
            <div class="cta-app-container">
                <a href=""><img src="./imgs/app-store.png" alt="Our app from App Store"></a>
                <a href=""><img src="./imgs/google-play.png" alt="Our app from Google Play"></a>
            </div>
        </section>
        <p class="footer-legal">&copy; 2023. All rights reserved.</p>
    </footer>
    
  
</body>
</html>

