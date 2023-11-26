<?php

include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

$auth = Auth::check();
$table = new UsersTable(new MYSQL);

$name = $_FILES['img']['name'];
$tmp = $_FILES['img']['tmp_name'];
$type = $_FILES['img']['type'];

if ($type == "image/jpeg" || $type == "image/png") {
    move_uploaded_file($tmp, "photos/$name");

    $table->uploadPhoto($auth->id, $name);

    $auth->photo = $name;

    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/profile.php", "error=type");
}
