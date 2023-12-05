<?php
    require_once './backend/database.php';
    $message = "";
    $messageLogin = "";

    if($_POST){
        if(isset($_POST["login"])){
            $user = $database->select("tb_users","*",[
                "user"=>$_POST["username"]
            ]);
            if(count($user) > 0){
                if(password_verify($_POST["password"], $user[0]["password"])){
                    session_start();
                    $_SESSION["isLoggedIn"] = true;
                    $_SESSION["name"] = $user[0]["name"];
                    header("location: index.php");
                }else{
                    $messageLogin = "wrong username or password";
                }
            }else{
                $messageLogin = "wrong username or password";
            }
        }

        if(isset($_POST["register"])){
            //validate if user already registered
            $validateUsername = $database->select("tb_users","*",[
                "user"=>$_POST["username"]
            ]);
            if(count($validateUsername) > 0){
                $message = "This username is already registered";
            }else{
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT, ['cost' => 12]);
                $database->insert("tb_users",[
                    "name"=> $_POST["name"],
                    "user"=> $_POST["username"],
                    "password"=> $pass,
                    "email"=> $_POST["email"]
                ]);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
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
        <!-- destinations -->
        <section class="dish-container order-container">
            <h2 class="featured-title">Order Online</h2>
            <div class="menu-container">
                <section class='menu'>
                    <h3 class='dish-title'>Login</h3>
                    <p>Enter your registered username and password in the designated fields.</p>
                    <form method="post" action="forms.php">
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='username'>Username</label>
                            </div>
                            <div>
                                <input id='username' class='form-input' type='text' name='username'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='password'>Password</label>
                            </div>
                            <div>
                                <input id='password' class='form-input' type='password' name='password'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <input class='form-input login-btn' type='submit' value="LOGIN">
                            </div>
                        </div>
                        <p><?php echo $messageLogin; ?></p>
                        <input type="hidden" name="login" value="1">
                    </form>
                </section>
                <section class='menu'>
                    <h3 class='dish-title'>Sign In</h3>
                    <p>Complete the registration process to enjoy our destinations.</p>
                    <form method="post" action="forms.php">
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='name'>Name</label>
                            </div>
                            <div>
                                <input id='name' class='form-input' type='text' name='name'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='email'>Email Address</label>
                            </div>
                            <div>
                                <input id='email' class='form-input' type='text' name='email'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='username'>Username</label>
                            </div>
                            <div>
                                <input id='username' class='form-input' type='text' name='username'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <label class='form-label dish-extra' for='password'>Password</label>
                            </div>
                            <div>
                                <input id='password' class='form-input' type='password' name='password'>
                            </div>
                        </div>
                        <div class='form-items'>
                            <div>
                                <input class='form-input login-btn' type='submit' value="REGISTER">
                            </div>
                        </div>
                        <p><?php echo $message; ?></p>
                        <input type="hidden" name="register" value="1">
                    </form>
                </section>
            </div>
        </section>
        <!-- destinations -->
    </main>
    <?php 
        include "./parts/footer.php";
    ?>
</body>
</html>