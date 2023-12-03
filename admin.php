<?php

use Helpers\Auth;
use Libs\Database\MYSQL;
use Libs\Database\UsersTable;

include("vendor/autoload.php");

$table = new UsersTable(new MYSQL);
$users = $table->getAll();

$auth = Auth::check();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <title>Admin</title>
</head>

<body>

    <nav class="navbar bg-dark navbar-dark navbar-expand">
        <div class="container">
            <a href="#" class="navbar-brand">Admin</a>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/project/profile.php" class="nav-link"><?= $auth->name; ?></a>
                </li>

                <li class="nav-item">
                    <a href="_actions/logout.php" class="nav-link text-danger">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card card-body bg-dark rounded-0">
        <table class="table table-striped table-dark table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <?php if ($auth->role_id >= 2) : ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id; ?></td>
                    <td><?= $user->name; ?></td>
                    <td><?= $user->email; ?></td>
                    <td><?= $user->phone; ?></td>
                    <td>
                        <?php if ($user->role_id == 3) : ?>
                            <span class="badge bg-warning">
                                <?= $user->role; ?>
                            </span>
                        <?php elseif ($user->role_id == 2) : ?>
                            <span class="badge bg-primary">
                                <?= $user->role; ?>
                            </span>
                        <?php else : ?>
                            <span class="badge bg-secondary">
                                <?= $user->role; ?>
                            </span>
                        <?php endif; ?>
                    </td>
                    <?php if ($auth->role_id >= 2) : ?>
                        <td>
                            <div class="btn-group dropdown">
                                <?php if ($auth->role_id == 3) : ?>
                                    <a href="#" class="dropdown-toggle btn btn-sm btn-outline-primary" data-bs-toggle="dropdown">
                                        Role
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-dark">
                                        <a class="dropdown-item" href="_actions/role.php?id=<?= $user->id; ?>&role_id=1">User</a>
                                        <a class="dropdown-item" href="_actions/role.php?id=<?= $user->id; ?>&role_id=2">Manager</a>
                                        <a class="dropdown-item" href="_actions/role.php?id=<?= $user->id; ?>&role_id=3">Admin</a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($auth->role_id >= 2) : ?>
                                    <?php if ($user->suspended) : ?>
                                        <a href="_actions/unsuspend.php?id=<?= $user->id; ?>" class="btn btn-sm btn-warning">Ban</a>
                                    <?php else : ?>
                                        <a href="_actions/suspend.php?id=<?= $user->id; ?>" class="btn btn-sm btn-outline-warning">Ban</a>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if ($auth->role_id == 3) : ?>
                                    <a href="_actions/delete.php?id=<?= $user->id; ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    <?php endif; ?>

                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>