<?php
    include "database.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $full_name = $_POST["full_name"];
        $id_no = $_POST["id_no"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO users(full_name, id_no, email, password) VALUES ('$full_name', '$id_no', '$email', '$password')";

        if($conn->query($sql) === TRUE) {
        } else {
        }
    }
?>
