<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Role</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <?php

    include("mysql.php");
    $db = dbConnect();
    $id = $_GET['id'];
    $result = $db->query("SELECT * FROM roles WHERE id=$id");
    $row = $result->fetch();

    ?>
    <h1>Edit Role</h1>

    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id']; ?>"><br>
        <input type="text" name="name" placeholder="name" value="<?= $row['name']; ?>"><br>
        <input type="text" name="value" placeholder="value" value="<?= $row['value']; ?>"><br>

        <button type="submit">Update</button>
    </form>
</body>

</html>