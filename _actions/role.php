<?php

use Helpers\HTTP;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

include("../vendor/autoload.php");

$id = $_GET['id'];
$role_id = $_GET['role_id'];

$table = new UsersTable(new MYSQL);
$table->changeRole($id, $role_id);

HTTP::redirect("/admin.php");
