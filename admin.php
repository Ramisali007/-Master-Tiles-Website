<?php include('includes/header.php'); include('db.php');

// Simple admin authentication (in a real application, use proper authentication)
$is_authenticated = false;

if (isset($_POST['admin_password']) && $_POST['admin_password'] === 'admin123') {
    $is_authenticated = true;
    // In a real application, you would set a session variable here
} elseif (isset($_GET['demo']) && $_GET['demo'] === 'true') {
    // For demo purposes only
    $is_authenticated = true;
}

// Fetch data from database
$quotes = $conn->query("SELECT * FROM quotes ORDER BY id DESC");
$contacts = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<div class="page-header">
    <h1>Admin Dashboard</h1>
</div>

<?php if (!$is_authenticated): ?>
<div class="admin-login">
    <form method="POST" class="admin-login-form">
        <h2>Admin Login</h2>
        <div class="form-group">
            <label for="admin_password">Password</label>
            <input type="password" id="admin_password" name="admin_password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn">Login</button>
        </div>
        <p class="admin-note">For demo purposes, use password: admin123</p>
        <p class="admin-note">Or <a href="admin.php?demo=true">click here</a> to view the demo dashboard</p>
    </form>
</div>
<?php else: ?>

<div class="admin-container">
    <div class="admin-section">
        <h2>Quote Requests</h2>
        <?php if ($quotes->num_rows > 0): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($q = $quotes->fetch_assoc()):
                    // Randomly assign statuses for demo purposes
                    $statuses = ['new', 'contacted', 'completed'];
                    $random_status = $statuses[array_rand($statuses)];
                ?>
                <tr>
                    <td><?php echo $q['id']; ?></td>
                    <td><?php echo htmlspecialchars($q['name']); ?></td>
                    <td><?php echo htmlspecialchars($q['email']); ?></td>
                    <td><?php echo htmlspecialchars($q['product']); ?></td>
                    <td><?php echo $q['quantity']; ?> sq.ft</td>
                    <td>$<?php echo number_format($q['total_price'], 2); ?></td>
                    <td><?php echo isset($q['created_at']) ? date('M d, Y', strtotime($q['created_at'])) : 'N/A'; ?></td>
                    <td><span class="status status-<?php echo $random_status; ?>"><?php echo ucfirst($random_status); ?></span></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No quote requests found.</p>
        <?php endif; ?>
    </div>

    <div class="admin-section">
        <h2>Contact Messages</h2>
        <?php if ($contacts->num_rows > 0): ?>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($c = $contacts->fetch_assoc()):
                    // Randomly assign statuses for demo purposes
                    $statuses = ['new', 'contacted', 'completed'];
                    $random_status = $statuses[array_rand($statuses)];
                ?>
                <tr>
                    <td><?php echo $c['id']; ?></td>
                    <td><?php echo htmlspecialchars($c['name']); ?></td>
                    <td><?php echo htmlspecialchars($c['email']); ?></td>
                    <td><?php echo substr(htmlspecialchars($c['message']), 0, 50) . (strlen($c['message']) > 50 ? '...' : ''); ?></td>
                    <td><?php echo isset($c['created_at']) ? date('M d, Y', strtotime($c['created_at'])) : 'N/A'; ?></td>
                    <td><span class="status status-<?php echo $random_status; ?>"><?php echo ucfirst($random_status); ?></span></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>No contact messages found.</p>
        <?php endif; ?>
    </div>

    <div class="admin-actions">
        <a href="index.php" class="btn">Return to Website</a>
    </div>
</div>

<?php endif; ?>

<?php include('includes/footer.php'); ?>