<?php include('includes/header.php'); include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();

    header('Location: thankyou.php?type=contact');
    exit();
}
?>

<div class="page-header">
    <h1>Contact Us</h1>
    <p>We'd love to hear from you. Get in touch with our team.</p>
</div>

<div class="contact-container">
    <div class="contact-form-container">
        <h2>Send Us a Message</h2>
        <form method="POST" class="contact-form">
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
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" placeholder="What is this regarding?">
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="6" required placeholder="Type your message here..."></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-large">Send Message</button>
            </div>
        </form>
    </div>

    <div class="contact-info-container">
        <div class="contact-info-card">
            <h3>Our Location</h3>
            <p><i class="icon-location"></i> 123 Tile Street, Suite 100<br>New York, NY 10001</p>
        </div>

        <div class="contact-info-card">
            <h3>Contact Information</h3>
            <p><i class="icon-phone"></i> Phone: +1 (123) 456-7890</p>
            <p><i class="icon-email"></i> Email: info@mastertiles.com</p>
        </div>

        <div class="contact-info-card">
            <h3>Business Hours</h3>
            <p><i class="icon-clock"></i> Monday - Friday: 9:00 AM - 6:00 PM</p>
            <p>Saturday: 10:00 AM - 4:00 PM</p>
            <p>Sunday: Closed</p>
        </div>

        <div class="contact-info-card">
            <h3>Follow Us</h3>
            <div class="social-links">
                <a href="#" class="social-link">Facebook</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="#" class="social-link">Twitter</a>
                <a href="#" class="social-link">LinkedIn</a>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>