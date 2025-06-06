<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include "database.php";

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_noSearch = trim($_POST["id_no"]);

    if (empty($id_noSearch)) {
        $_SESSION['search_error'] = "Please enter an ID number.";
        header("Location: ?page=dashboard");
        exit();
    }

    $stmt = $conn->prepare("
        SELECT u.full_name, u.id_no, up.file 
        FROM users u
        LEFT JOIN uploads up ON up.user_id = u.id
        WHERE u.id_no = ?
    ");
    $stmt->bind_param("s", $id_noSearch);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $_SESSION['searched_full_name'] = $row['full_name'];
        $_SESSION['searched_id_no'] = $row['id_no'];
        $_SESSION['searched_image'] = $row['file'] ?? null;

        header("Location: ?page=search");
        exit();
    } else {
        $_SESSION['search_error'] = "No user found with that ID.";
        header("Location: ?page=dashboard");
        exit();
    }
}
$fullNameSearch = $_SESSION['searched_full_name'] ?? "Guest";
$id_noSearch = $_SESSION['searched_id_no'] ?? "N/A";
$searchImage = $_SESSION['searched_image'] ?? "assets/img/dummy.jpg";

$searchError = $_SESSION['search_error'] ?? null;
if ($searchError) {
    unset($_SESSION['search_error']);
}

?>


