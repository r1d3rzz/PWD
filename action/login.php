<?php

$email = $_POST['email'];
$password = $_POST['password'];

if ($email === "rider@gmail.com" && $password === "rider") {
    session_start();
    $_SESSION['user'] = ['name' => 'Rider'];
    header("Location: /profile.php");
} else {
    header("Location: /?incorrect=login");
}
