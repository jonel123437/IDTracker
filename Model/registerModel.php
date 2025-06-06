<?php
include "database.php";

$success = false; 
$error = false; 
$email_exists = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $id_no = $_POST["id_no"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if id_no or email already exists
    $check_query = "SELECT * FROM users WHERE id_no = ? OR email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ss", $id_no, $email);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        while ($row = $check_result->fetch_assoc()) {
            if ($row["id_no"] === $id_no) {
                $error = "ID already exists.";
            } elseif ($row["email"] === $email) {
                $email_exists = true;
            }
        }
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(full_name, id_no, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $full_name, $id_no, $email, $hashed_password);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Registration failed. Try again.";
        }
    }
}
?>
