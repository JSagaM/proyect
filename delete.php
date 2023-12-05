<?php 
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/where
    if($_GET){
        $data = $database->select("tb_users","*",[
            "id_user"=>$_GET["id"]
        ]);
    }

    if($_POST){
        // Reference: https://medoo.in/api/delete
        $database->delete("tb_users",[
            "id_user"=>$_POST["id"]
        ]);
        header("location: list-users.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>
<body>
    <h2>Delete User: <?php echo $data[0]["user"]; ?></h2>
    <form method="post" action="delete.php">
        <input name="id" type="hidden" value="<?php echo $data[0]["id_user"]; ?>">
        <input type="button" onclick="history.back();" value="CANCEL">
        <input type="submit" value="DELETE">
    </form>
</body>
</html>