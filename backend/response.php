<?php
    require_once 'database.php';
    // Reference: https://medoo.in/api/insert
    $database->insert("tb_users",[
        "user"=>$_POST["user"],
        "password"=>$_POST["password"],
        "email"=>$_POST["email"]
    ]);
?>
    