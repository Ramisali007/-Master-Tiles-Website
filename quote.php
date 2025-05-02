<?php include('includes/header.php'); include('db.php');

// Set default product if coming from products page
$selected_product = '';
if (isset($_GET['product'])) {
    $selected_product = $_GET['product'];
}

// Define product prices
$product_prices = [
    'Classic Ceramic' => 25.99,
    'Modern Ceramic' => 29.99,
    'Premium Porcelain' => 35.99,
    'Luxury Porcelain' => 42.99,
    'Italian Marble' => 59.99,
    'Classic Marble' => 49.99,
    'Geometric Mosaic' => 45.99,
    'Glass Mosaic' => 39.99
];

// Default price if product not in list
$default_price = 50.00;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $message = $_POST['message'];

    // Calculate price based on product
    $price_per_unit = isset($product_prices[$product]) ? $product_prices[$product] : $default_price;
    $total = $quantity * $price_per_unit;

    $stmt = $conn->prepare("INSERT INTO quotes (name, email, product, quantity, total_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssid", $name, $email, $product, $quantity, $total);
    $stmt->execute();

    header('Location: thankyou.php?type=quote');
    exit();
}
?>

<div class="page-header">
    <h1>Request a Quote</h1>
    <p>Fill out the form below to get a personalized quote for your project</p>
</div>

<div class="quote-form-container">
    <form method="POST" class="quote-form">
        <div class="form-group">
            <label for="name">Your Name *</label>
            <input type="text" id="name" name="name" required placeholder="Enter your full name">
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email address">
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number">
        </div>

        <div class="form-group">
            <label for="product">Product *</label>
            <select id="product" name="product" required>
                <option value="" disabled <?php echo empty($selected_product) ? 'selected' : ''; ?>>Select a product</option>
                <?php foreach ($product_prices as $product => $price): ?>
                    <option value="<?php echo $product; ?>" <?php echo ($selected_product == $product) ? 'selected' : ''; ?>>
                        <?php echo $product; ?> - $<?php echo $price; ?> per sq.ft
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity (sq.ft) *</label>
            <input type="number" id="quantity" name="quantity" min="1" required placeholder="Enter quantity in square feet">
        </div>

        <div class="form-group">
            <label for="message">Additional Information</label>
            <textarea id="message" name="message" rows="4" placeholder="Tell us more about your project or any specific requirements"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-large">Submit Quote Request</button>
        </div>
    </form>

    <div class="quote-info">
        <h3>Why Choose Master Tiles?</h3>
        <ul>
            <li>Premium quality tiles from trusted manufacturers</li>
            <li>Competitive pricing with no hidden costs</li>
            <li>Expert installation services available</li>
            <li>Free consultation and design advice</li>
            <li>Extensive selection to match any style</li>
        </ul>

        <div class="contact-info">
            <h3>Need Help?</h3>
            <p>Call us at: <strong>+1 (123) 456-7890</strong></p>
            <p>Email: <strong>info@mastertiles.com</strong></p>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>