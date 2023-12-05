<?php 
namespace Medoo;
require 'Medoo.php';
    /* 
    - For Laragon: username='root' / password=''
    - For MAMP: username='root' / password='root'
    https://pastebin.com/raw/sfwWMGjy
      */
    $database = new Medoo([
        'type'=>'mysql',
        'host' => 'localhost',
        'database' => 'restaurant',
        'username' => 'root',
        'password' => ''
    ]);
?>