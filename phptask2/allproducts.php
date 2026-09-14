<?php
session_start();

$products = [
    'product 1' => [
        'price' => '620',
        'desc'  => 'tint',
        'img'=> 'img/tint.jpg'
    ],
    'product 2' => [
        'price' => '3500',
        'desc'  => 'concelar',
        'img'=> 'img/concelar.jpg'
    ],
    'product 3' => [
        'price' => '1200',
        'desc'  => 'eyeliner',
        'img'=> 'img/eyeliner.jpg'
    ],
    'product 4' => [
        'price' => '700',
        'desc'  => 'eyebrow gel',
        'img'=> 'img/eyebrow.jpg'
    ],
    'product 5' => [
        'price' => '1500',
        'desc'  => 'blush',
        'img'=> 'img/blush.jpg'
    ],
    'product 6' => [
        'price' => '700',
        'desc'  => 'lipliner',
        'img'=> 'img/lipliner.jpg'
    ],
];
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>My Store - All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        body{ background-color: #f8d7da ;}
        .bg-pink { background-color: #e83e8c !important; }
        .text-pink { color: #e83e8c !important; }
        .card-img-placeholder {
            height: 180px; 
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
    </style>
</head>
<body >

   
    <nav class="navbar navbar-expand-lg navbar-dark bg-pink sticky-top shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold h4 mb-0 text-white" href="index.php">GORG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white active" href="products.php">All Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="account.php">Account</a></li>
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <li class="nav-item"><a class="nav-link text-warning font-weight-bold" href="logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

  
    <div class="container my-4">
        <h2 class="text-pink text-center mb-4 font-weight-bold">Our Products</h2>
        <div class="row">
            <?php foreach ($products as $productName => $values): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-light shadow-sm">
                        
                        <div class="card-img-placeholder">
                          <img src="<?= $values['img'] ?>" class="card-img-top" alt="<?= $productName ?>" style=" width:110px ">  
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text-capitalize font-weight-bold"><?= $productName ?></h5>
                            <p class="card-text text-muted"><?= $values['desc'] ?></p>
                            <h6 class="text-pink font-weight-bold">$<?= $values['price'] ?></h6>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>
</html>