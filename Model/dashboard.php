<?php
    session_start(); // Start the session to access session variables

    // Check if the full name is set in the session
    if(isset($_SESSION['full_name'])) {
        $fullName = $_SESSION['full_name'];
    } else {
        $fullName = "Guest"; // Default value if full name is not set
    }
?>
