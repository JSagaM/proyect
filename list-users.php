<?php 
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/select
    $items = $database->select("tb_users","*");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <?php
            foreach($items as $item){
                echo "<tr>";
                echo "<td>".$item["user"]."</td>";
                echo "<td>".$item["email"]."</td>";
                echo "<td><a href='edit.php?id=".$item["id_user"]."'>Edit</a> <a href='delete.php?id=".$item["id_user"]."'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </table>    
</body>
</html>