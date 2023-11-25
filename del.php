<?php

include("mysql.php");

$db = dbConnect();

$id = $_GET['id'];
$db->query("DELETE FROM roles WHERE id=$id");

header('location: /project/index.php');
