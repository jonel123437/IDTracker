<?php
include "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            if(password_verify($password, $hashed_password)) {
                $fullNameProfile = $row['full_name'];
                $id_noProfile = $row["id_no"];
                
                session_start();
                
                $_SESSION['full_name'] = $fullNameProfile;
                $_SESSION["id_no"] = $id_noProfile;

                header("Location: ?page=dashboard");
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    }

    session_start(); // Start the session to access session variables

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
