<?php

use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

include("vendor/autoload.php");

$table = new UsersTable(new MYSQL);
$user = $table->findByEmailAndPassword("rider@gmail.com", "rider");

print_r($user);
