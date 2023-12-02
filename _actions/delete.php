<?php

use Helpers\HTTP;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

include("../vendor/autoload.php");

$id = $_GET['id'];

$table = new UsersTable(new MYSQL);
$table->destroy($id);

HTTP::redirect("/admin.php");
