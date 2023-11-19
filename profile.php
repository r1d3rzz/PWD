<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">

        <!-- Check Error  -->
        <?php if (isset($_GET["error"])) : ?>
            <div class="alert alert-danger">Cannot Upload Photo</div>
        <?php endif ?>

        <!-- Show Upload Image  -->
        <?php if (file_exists("_actions/photos/profile.jpg")) : ?>
            <img src="_actions/photos/profile.jpg" alt="" width="300" class="img-thumbnail">
        <?php endif ?>

        <!-- Upload Image Input  -->
        <form action="/_actions/upload.php" method="POST" class="input-group my-3" enctype="multipart/form-data">
            <input type="file" name="img" id="image" class="form-control">
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <h1 class="mb-3">John Doe (Manager)</h1>
        <ul class="list-group">
            <li class="list-group-item">
                <b>Email:</b> john.doe@gmail.com
            </li>
            <li class="list-group-item">
                <b>Phone:</b> (09) 243 867 645
            </li>
            <li class="list-group-item">
                <b>Address:</b> No. 321, Main Street, West City
            </li>
        </ul>
        <br>
        <a href="_actions/logout.php">Logout</a>
    </div>
</body>

</html>