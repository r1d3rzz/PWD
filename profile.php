<?php

session_start();

$login = $_SESSION['user'];

if (!$login) {
    header("Location: /");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Auth</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 mb-2">Profile</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group mb-2">
                            <li class="list-group-item"><?= $_SESSION['user']['name']; ?></li>
                        </ul>

                        <a href="action/logout.php" class="btn btn-sm btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>