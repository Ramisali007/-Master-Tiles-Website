<?php
// This file will check for and remove any duplicate navigation elements
// Add this to the top of your index.php file

// Function to check if there are duplicate navigation elements
function checkForDuplicateNavigation() {
    $html = ob_get_contents();
    
    // Check if there are multiple navigation elements
    $navCount = substr_count($html, '<a href=\'index.php\'><i class="fas fa-home"></i> Home</a>');
    
    if ($navCount > 1) {
        // Remove duplicate navigation
        $html = preg_replace('/<a href=\'index.php\'><i class="fas fa-home"><\/i> Home<\/a>.*?<a href=\'admin.php\'><i class="fas fa-user-shield"><\/i> Admin<\/a>/s', '', $html, 1);
        
        // Output the cleaned HTML
        ob_end_clean();
        echo $html;
        exit;
    }
}

// Start output buffering
ob_start();
// Register a shutdown function to check for duplicates
register_shutdown_function('checkForDuplicateNavigation');
?>
