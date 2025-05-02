<?php include('includes/header.php');
$type = isset($_GET['type']) ? $_GET['type'] : '';
$title = 'Thank You!';
$message = 'We have received your submission.';
$action = 'Return to Home';
$action_url = 'index.php';

if ($type == 'quote') {
    $title = 'Quote Request Received!';
    $message = 'Thank you for your quote request. Our team will review your requirements and get back to you within 24 hours with a detailed quote.';
    $action = 'Browse More Products';
    $action_url = 'products.php';
} elseif ($type == 'contact') {
    $title = 'Message Sent!';
    $message = 'Thank you for contacting us. We appreciate your message and will respond as soon as possible, usually within 1-2 business days.';
    $action = 'Return to Home';
    $action_url = 'index.php';
}
?>

<div class="thankyou-container">
    <div class="thankyou-card">
        <div class="thankyou-icon">✓</div>
        <h1><?php echo $title; ?></h1>
        <p><?php echo $message; ?></p>
        <div class="thankyou-actions">
            <a href="<?php echo $action_url; ?>" class="btn"><?php echo $action; ?></a>
            <a href="index.php" class="btn btn-secondary">Return to Home</a>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>