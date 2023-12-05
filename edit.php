<?php 
    require_once './backend/database.php';
    // Reference: https://medoo.in/api/where
    if($_GET){
        $data = $database->select("tb_users","*",[
            "id_user"=>$_GET["id"]
        ]);
    }

    if($_POST){
        // Reference: https://medoo.in/api/update
        $database->update("tb_users",[
            "user"=>$_POST["user"],
            "email"=>$_POST["email"]
        ],[
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
    <title>Edit User Info</title>
</head>
<body>
    <form method="post" action="edit.php">
        <label for="user">Username</label>
        <input name="user" type="text" value="<?php echo $data[0]["user"] ?>">
        <label for="email">Email</label>
        <input name="email" type="text" value="<?php echo $data[0]["email"] ?>" >
        <input name="id" type="hidden" value="<?php echo $data[0]["id_user"] ?>">
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>