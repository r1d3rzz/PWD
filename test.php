<?php

use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

include("vendor/autoload.php");

$table = new UsersTable(new MYSQL);
$id = $table->insert([
    "name" => "Rider",
    "email" => "rider@gmail.com",
    "phone" => "123456",
    "address" => "yangon",
    "password" => "password",
]);

echo $id;
