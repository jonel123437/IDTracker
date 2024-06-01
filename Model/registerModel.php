<?php
    include "database.php";

    $success = false; 
    $error = false; 

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST["full_name"];
        $id_no = $_POST["id_no"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $check_query = "SELECT * FROM users WHERE id_no = '$id_no'";
        $check_result = $conn->query($check_query);

        if($check_result->num_rows > 0) {
            $error = true;
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(full_name, id_no, email, password) VALUES ('$full_name', '$id_no', '$email', '$hashed_password')";

            if($conn->query($sql) === TRUE) {
                $success = true;
            } else {
                $error = true; 
            }
        }
    }
?>
