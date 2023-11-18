<?php

include("vendor/autoload.php");

use Helpers\Auth;
use Helpers\HTTP;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();
echo $faker->email();
echo "<br>";

Auth::check();
HTTP::redirect();

$db = new MYSQL;
$db->connect();

$users = new UsersTable;
$users->insert();
