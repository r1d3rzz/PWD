<?php

use Helpers\Auth;

include("vendor/autoload.php");

$user = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-6 mx-auto mt-4">
                <!-- Check Error  -->
                <?php if (isset($_GET["error"])) : ?>
                    <div class="alert alert-danger">Cannot Upload Photo</div>
                <?php endif ?>

                <!-- Show Upload Image  -->
                <?php if ($user->photo) : ?>
                    <img src="_actions/photos/<?= $user->photo; ?>" alt="" width="300" class="img-thumbnail">
                <?php endif ?>

                <!-- Upload Image Input  -->
                <form action="_actions/upload.php" method="POST" class="input-group my-3" enctype="multipart/form-data">
                    <input type="file" name="img" id="image" class="form-control">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                <div class="card card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <b>Name:</b> <?= $user->name; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Email:</b> <?= $user->email; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Phone:</b> <?= $user->phone; ?>
                        </li>
                        <li class="list-group-item">
                            <b>Address:</b> <?= $user->address; ?>
                        </li>
                    </ul>
                </div>
                <br>
                <a href="admin.php" class="text-decoration-none">Admin</a>
                <span class="text-white">|</span>
                <a href="_actions/logout.php" class="text-decoration-none text-danger">Logout</a>
            </div>
        </div>

    </div>
</body>

</html>