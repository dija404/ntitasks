<?php
session_start();

$errors = [];

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $errors[] = "please enter email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid format";
    }

    if (empty($password)) {
        $errors[] = "password required";
    } elseif (strlen($password) < 6) {
        $errors[] = "password should be longer than 6";
    }

    if (empty($errors)) {
        $_SESSION['user_email'] = $email;
        header("Location: allproducts.php");
        exit();
    }
}

if (isset($_POST['update_profile'])) {
    $username  = trim($_POST['username']);
    $password  = trim($_POST['password']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $facebook  = trim($_POST['facebook']);
    $twitter   = trim($_POST['twitter']);
    $instagram = trim($_POST['instagram']);

    if (empty($username)) {
        $errors[] = "username required";
    }

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "password should be longer than 6";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "invalid email";
    }

    if (empty($phone) || !preg_match('/^[0-9]{11}$/', $phone)) {
        $errors[] = "invalid number";
    }

    if (empty($facebook) || !filter_var($facebook, FILTER_VALIDATE_URL)) {
        $errors[] = "invalid link";
    }

    if (empty($twitter) || !filter_var($twitter, FILTER_VALIDATE_URL)) {
        $errors[] = "invalid link";
    }

    if (empty($instagram) || !filter_var($instagram, FILTER_VALIDATE_URL)) {
        $errors[] = "invalid link";
    }

    if (empty($errors)) {
        $_SESSION['user_profile'] = [
            'username'  => $username,
            'email'     => $email,
            'phone'     => $phone,
            'facebook'  => $facebook,
            'twitter'   => $twitter,
            'instagram' => $instagram
        ];
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>My Store - Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        .bg-pink { background-color: #e83e8c ; }
        .text-pink { color: #e83e8c ; }
        .btn-pink { background-color: #e83e8c; color: #fff; border: none; }
        .btn-pink:hover { background-color: #d63384; color: #fff; }
        body{background-color:#f8d7da  }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-pink sticky-top shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold h4 mb-0 text-white" href="index.php">GORG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="allproducts.php">All Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white active" href="account.php">Account</a></li>
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <li class="nav-item"><a class="nav-link text-warning font-weight-bold" href="logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5" style="max-width: 550px;">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0 pr-3">
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (!isset($_SESSION['user_email'])): ?>

                    <h3 class="text-pink text-center font-weight-bold mb-4">Account Login</h3>
                    <form action="account.php" method="POST">
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-pink btn-block py-2">Login</button>
                    </form>

                <?php else: ?>
                    <h3 class="text-pink text-center font-weight-bold mb-4">Update Profile</h3>
                    <form action="account.php" method="POST">
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Email</label>
                            <input type="email" name="email" value="<?= $_SESSION['user_email'] ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Phone Number</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Facebook URL</label>
                            <input type="text" name="facebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Twitter URL</label>
                            <input type="text" name="twitter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-secondary font-weight-bold">Instagram URL</label>
                            <input type="text" name="instagram" class="form-control">
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-pink btn-block py-2">Save Details</button>
                    </form>
                <?php endif; ?>

            </div>
        </div>
    </div>

</body>
</html>