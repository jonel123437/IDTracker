<?php
    include "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            // User found, retrieve the full name
            $row = $result->fetch_assoc();
            $fullNameProfile = $row['full_name'];
            $id_noProfile = $row["id_no"];
            // Start the session
            session_start();
            
            // Store the full name in a session variable
            $_SESSION['full_name'] = $fullNameProfile;
            $_SESSION["id_no"] = $id_noProfile;

            // Redirect to the dashboard
            header("Location: ?page=dashboard");
        } else {
        }
    }

    session_start(); // Start the session to access session variables

    // Check if the full name is set in the session
    if(isset($_SESSION['full_name'])) {
        $fullNameProfile = $_SESSION['full_name'];
    } else {
        $fullNameProfile = "Guest"; // Default value if full name is not set
    }
    if(isset($_SESSION['id_no'])) {
        $id_noProfile = $_SESSION['id_no'];
    } else {
        $id_noProfile = "N/A"; // Default value if ID number is not set
    }
?>
