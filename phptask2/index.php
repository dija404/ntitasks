
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>My Store - Home</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
    <style>
        :root {
            --pink-main: #e83e8c;
            --pink-dark: #d63384;
            --pink-light: #f8d7da;
        }
        .bg-pink {
            background-color: var(--pink-main) !important;
        }
        .text-pink {
            color: var(--pink-main) !important;
        }
        .btn-pink {
            background-color: var(--pink-main);
            color: #fff;
            border: none;
        }
    
        header {
            background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url( img/bg.jpg) no-repeat center center/cover;
            height: 800px; 
            min-height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        footer{
            background-color: var(--pink-dark: #d63384);
            height: 300px;
        }
    </style>
</head>
<body>

    <!-- Sticky Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-pink sticky-top shadow-sm">
        <div class="container">
            
            <a class="navbar-brand font-weight-bold h4 mb-0 text-white" href="index.php">GORG</a>
    

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="allproducts.php">All Products</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="account.php">Account</a></li>
                    <?php if (isset($_SESSION['user_email'])): ?>
                        <li class="nav-item"><a class="nav-link text-warning font-weight-bold" href="logout.php">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    
    <header  class="header text-center p-5">
        <div>
            <h1 class="display-4 font-weight-bold text-pink">Welcome to Our Store</h1>
            <p class="lead text-secondary">Discover our amazing products today!</p>
        </div>
     </header>
     <!-- <footerbg-pink text-white text-center py-3 mt-auto shadow-sm> <p >&GORG; 2024 GORG. All rights reserved.</p>
        <p >Email: info@GORG.com | Phone: +20 155568887 </p></footerbg-pink> -->

</body>
</html>