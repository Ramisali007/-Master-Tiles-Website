<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Tiles - Premium Tiles for Elegant Living</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Three.js Background Container -->
    <div id="bg-animation"></div>

    <header>
        <div class="logo">
            <img src="assets/images/logo.png" alt="Master Tiles Logo">
        </div>
        <nav class="desktop-nav">
            <a href='index.php' class="nav-link"><span>Home</span></a>
            <a href='about.php' class="nav-link"><span>About</span></a>
            <a href='products.php' class="nav-link"><span>Products</span></a>
            <a href='quote.php' class="nav-link"><span>Get a Quote</span></a>
            <a href='contact.php' class="nav-link"><span>Contact Us</span></a>
            <a href='admin.php' class="nav-link"><span>Admin</span></a>
        </nav>
        <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
    </header>

    <!-- Mobile menu overlay -->
    <div class="mobile-menu-overlay"></div>

    <!-- Mobile navigation menu -->
    <div class="mobile-nav">
        <div class="mobile-nav-close">
            <i class="fas fa-times"></i>
        </div>
        <a href='index.php'><i class="fas fa-home"></i> Home</a>
        <a href='about.php'><i class="fas fa-info-circle"></i> About</a>
        <a href='products.php'><i class="fas fa-th"></i> Products</a>
        <a href='quote.php'><i class="fas fa-file-invoice-dollar"></i> Get a Quote</a>
        <a href='contact.php'><i class="fas fa-envelope"></i> Contact Us</a>
        <a href='admin.php'><i class="fas fa-user-shield"></i> Admin</a>
    </div>

    <?php
    // Set a flag to prevent duplicate navigation
    $GLOBALS['navigation_rendered'] = true;
    ?>

    <main class="container">