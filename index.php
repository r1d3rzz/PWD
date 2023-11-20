<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles List</title>

    <style>
        body {
            background-color: black;
            color: white;
        }
    </style>
</head>

<body>
    <?php

    $db = new PDO("mysql:dbhost=localhost;dbname=project", "root", "");
    $sql = "SELECT * FROM roles";
    $result = $db->query($sql);
    $rows = $result->fetchAll();
    ?>

    <h2>Roles List</h2>

    <ul>
        <?php foreach ($rows as $row) : ?>

            <li>
                <?= $row['name']; ?>
                (<?= $row['value']; ?>)
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="del.php?id=<?= $row['id']; ?>">Del</a>
            </li>

        <?php endforeach; ?>
    </ul>

    <a href="new.php">Add New Role</a>
</body>

</html>