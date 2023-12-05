<?php
    $title = "PHP - Backend";
    $status = true;
    $total = 10;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BACKEND INDEX</title>
    <style>
        body{
            font-family: Arial;
            padding: 0;
            margin: 0;
        }
        .title{
            font-size: 6rem;
        }
        .content{
            font-size: 4rem;
        }
    </style>
</head>
<body>
    <?php
        echo "<h1 class='title'>".$title."</h1>";
        if($status){
            echo "<p class='content'>content for the section goes here</p>";
        }
    ?>
    <form method="post" action="response.php">
        <label for="fname">Name:</label>
        <input name="fname" type="text">
        <label for="total">Total:</label>
        <input name="total" type="text">
        <input type="submit" value="SUBMIT FORM">
    </form>
</body>
</html>