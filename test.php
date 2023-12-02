<?php

include("vendor/autoload.php");

use Libs\Database\MYSQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();

$table = new UsersTable(new MYSQL);

print_r($table->getAll());
die();

echo "Inserting...";

// for ($i = 0; $i < 20; $i++) {
//     $user = $table->insert([
//         "name" => $faker->name,
//         "email" => $faker->email,
//         "phone" => $faker->phoneNumber,
//         "address" => $faker->address,
//         "password" => "password",
//     ]);
// }

echo "Done.";
