<?php

$tmp = $_FILES['img']['tmp_name'];
$type = $_FILES['img']['type'];

if ($type == "image/jpeg" || $type == "image/png") {
    move_uploaded_file($tmp, "photos/profile.jpg");
    header('location: ../profile.php');
} else {
    header('location: ../profile.php?error=type');
}
