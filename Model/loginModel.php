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
    
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
    
            if(password_verify($password, $stored_password)) {
                $fullNameProfile = $row['full_name'];
                $id_noProfile = $row["id_no"];
                
                session_start();
                
                $_SESSION['full_name'] = $fullNameProfile;
                $_SESSION["id_no"] = $id_noProfile;
    
                header("Location: ?page=dashboard");
                exit(); 
            } else {
                if($password === $stored_password) {
                    $fullNameProfile = $row['full_name'];
                    $id_noProfile = $row["id_no"];
                    
                    session_start();
                    
                    $_SESSION['full_name'] = $fullNameProfile;
                    $_SESSION["id_no"] = $id_noProfile;
    
                    header("Location: ?page=dashboard");
                    exit();
                } else {
                    $error = true;
                }
            }
        } else {
            $error = true;
        }
    }
    

    session_start();

    if(isset($_SESSION['full_name'])) {
        $fullNameProfile = $_SESSION['full_name'];
    } else {
        $fullNameProfile = "Guest"; 
    }
    if(isset($_SESSION['id_no'])) {
        $id_noProfile = $_SESSION['id_no'];
    } else {
        $id_noProfile = "N/A";
    }
?>
