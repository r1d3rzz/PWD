<?php

include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MYSQL);

$table->insert([
    "name" => $_POST["name"],
    "email" => $_POST["email"],
    "phone" => $_POST["phone"],
    "address" => $_POST["address"],
    "password" => $_POST["password"],
]);

return HTTP::redirect("/index.php", "register=success");
