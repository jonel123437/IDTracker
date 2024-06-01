<?php
    include "database.php";
    // Check if an image is uploaded
    $imageSrc = "assets/img/dummy.jpg"; // Default dummy image
    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'assets/img/'.$file_name;
        // Move uploaded file to the destination folder
        if(move_uploaded_file($tempname, $folder)) {
            $imageSrc = $folder; // Use uploaded image

            $sql = "INSERT INTO uploads(file) VALUES ('$folder')";
        }
    }
    
    
    session_start();
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
