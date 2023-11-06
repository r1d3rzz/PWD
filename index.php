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
                        <h1 class="h3 mb-2">Login Here</h1>
                    </div>
                    <div class="card-body">
                        <form action="action/login.php" method="POST">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                                <?php if (isset($_GET['incorrect'])) : ?>

                                    <div class="text-danger">
                                        Incorrect Password or Eamil
                                    </div>

                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>

                            <div>
                                <button class="btn float-end btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>