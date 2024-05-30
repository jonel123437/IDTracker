<?php
    include "database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_noSearch = $_POST["id_no"];
        
        $sql = "SELECT * FROM users WHERE id_no = '$id_noSearch'";
        $result = $conn->query($sql);
    
        if($result->num_rows > 0) {
            // User found, retrieve the full name
            $row = $result->fetch_assoc();
            $fullNameSearch = $row['full_name'];
            $id_noSearch = $row["id_no"];
            // Store user data in session variables
            $_SESSION['searched_full_name'] = $fullNameSearch;
            $_SESSION["searched_id_no"] = $id_noSearch;
    
            header("Location: ?page=search");
        } else {
            // Handle case when user is not found
        }
    }

    if(isset($_SESSION['searched_full_name'])) {
        $fullNameSearch = $_SESSION['searched_full_name'];
    } else {
        $fullNameSearch = "Guest"; // Default value if full name is not set
    }
    
    // Check if the ID number is set in the session
    if(isset($_SESSION['searched_id_no'])) {
        $id_noSearch = $_SESSION['searched_id_no'];
    } else {
        $id_noSearch = "N/A"; // Default value if ID number is not set
    }
?>
