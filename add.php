<?php

$name = $_POST['name'];
$value = $_POST['value'];

$sql = "INSERT INTO roles (name,value) VALUES ('$name',$value)";

$db = new PDO('mysql:dbhost=localhost;dbname=project', "root", "");
$db->query($sql);

header('location: /');
