<?php

include("mysql.php");

$db = dbConnect();

$name = $_POST['name'];
$value = $_POST['value'];
$id = $_POST['id'];

$sql = "UPDATE roles SET name='$name', value=$value WHERE id=$id";
$db->query($sql);

header('location: /');
