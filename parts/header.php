<header class="hero-container">
    <nav class="top-nav">
        <a href="#"><img src="./imgs/logo.svg" alt="Restaurant Logo"></a>
        <!-- mobile nav btn -->
        <input class="mobile-check" type="checkbox">
        <label class="mobile-btn">
            <span></span>
        </label>
        <!-- mobile nav btn -->
        <ul class="nav-list">
            <li><a class="nav-list-link" href="index.php">Home</a></li>
            <li><a class="nav-list-link" href="menu.php">Menu</a></li>
            <li><a class="nav-list-link" href="#footer">Contact us</a></li>
            <?php 
                session_start();
                if(isset($_SESSION["isLoggedIn"])){
                    echo "<li><a class='nav-list-link' href='profile.php'>".$_SESSION["name"]."</a></li>";
                    echo "<li><a class='nav-list-link' href='logout.php'>Logout</a></li>";
                }else{
                    echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>