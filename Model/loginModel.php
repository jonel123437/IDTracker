<?php
include "database.php";

$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Try password_verify first (hashed password)
        if (password_verify($password, $stored_password) || $password === $stored_password) {
            session_start();

            // Set session variables including user ID
            $_SESSION['user_id'] = $row['id'];       // THIS WAS MISSING
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['id_no'] = $row['id_no'];

            header("Location: ?page=dashboard");
            exit();
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

// To show user info if already logged in
session_start();
$fullNameProfile = $_SESSION['full_name'] ?? "Guest";
$id_noProfile = $_SESSION['id_no'] ?? "N/A";
?>
