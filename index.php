<?php
// Fix for duplicate navigation
$GLOBALS['navigation_rendered'] = false;

include('includes/header.php');
?>

<div class="banner">
    <div class="banner-overlay"></div>
    <div class="banner-text" data-aos="fade-up">
        <div class="banner-content">
            <h1 class="animated-heading">Premium Tiles for Elegant Living</h1>
            <a href="products.php" class="btn btn-animated">View Our Collection</a>
        </div>
    </div>
</div>

<div class="welcome" data-aos="fade-up">
    <h2>Welcome to <span class="highlight">Master Tiles</span></h2>
    <p>At Master Tiles, we provide premium quality tiles for all your residential and commercial needs. With over 20 years of experience in the industry, we offer a wide range of tiles that combine durability, aesthetics, and value.</p>
</div>

<div class="features">
    <div class="feature" data-aos="fade-up" data-aos-delay="100">
        <div class="feature-icon">
            <i class="fas fa-medal"></i>
        </div>
        <h3>Premium Quality</h3>
        <p>All our tiles are sourced from the best manufacturers around the world, ensuring top-notch quality and durability.</p>
    </div>
    <div class="feature" data-aos="fade-up" data-aos-delay="200">
        <div class="feature-icon">
            <i class="fas fa-th"></i>
        </div>
        <h3>Wide Selection</h3>
        <p>Choose from our extensive collection of ceramic, porcelain, marble, and mosaic tiles in various designs and colors.</p>
    </div>
    <div class="feature" data-aos="fade-up" data-aos-delay="300">
        <div class="feature-icon">
            <i class="fas fa-comments"></i>
        </div>
        <h3>Expert Advice</h3>
        <p>Our team of experts is always ready to help you select the perfect tiles for your space and provide installation guidance.</p>
    </div>
</div>

<div class="showcase-section" data-aos="fade-up">
    <h2>Featured Products</h2>
    <div class="product-showcase">
        <div class="showcase-item">
            <div class="product-3d-container" id="product3d-1"></div>
            <h3>Luxury Marble</h3>
            <p>Elegant and timeless</p>
        </div>
        <div class="showcase-item">
            <div class="product-3d-container" id="product3d-2"></div>
            <h3>Modern Ceramic</h3>
            <p>Contemporary designs</p>
        </div>
        <div class="showcase-item">
            <div class="product-3d-container" id="product3d-3"></div>
            <h3>Porcelain Collection</h3>
            <p>Durable and stylish</p>
        </div>
    </div>
</div>

<div class="cta-section" data-aos="fade-up">
    <div class="cta-overlay"></div>
    <h2>Ready to Transform Your Space?</h2>
    <p>Get in touch with us today for a free consultation and quote.</p>
    <div class="cta-buttons">
        <a href="quote.php" class="btn btn-animated">Get a Quote</a>
        <a href="contact.php" class="btn btn-secondary btn-animated">Contact Us</a>
    </div>
</div>

<?php include('includes/footer.php'); ?>