<?php
session_start();
include "database.php";

$errors = []; // collect errors to show in page

// Default image
$imageSrc = "assets/img/dummy.jpg";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $file = $_FILES['image'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = "Upload error code: " . $file['error'];
        } else {
            $originalName = basename($file['name']);
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($ext, $allowed)) {
                $uniqueName = 'user_' . $user_id . '_' . time() . '.' . $ext;
                $uploadDir = 'assets/img/';
                $uploadPath = $uploadDir . $uniqueName;

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    // Check if user already has an image uploaded
                $stmtCheck = $conn->prepare("SELECT id, file FROM uploads WHERE user_id = ?");
                if ($stmtCheck) {
                    $stmtCheck->bind_param("i", $user_id);
                    $stmtCheck->execute();
                    $resultCheck = $stmtCheck->get_result();

                    if ($resultCheck->num_rows > 0) {
                        // User has an existing image, update it
                        $row = $resultCheck->fetch_assoc();
                        $existingId = $row['id'];
                        $oldFile = $row['file'];

                        // Optionally delete old image file (avoid deleting dummy or missing)
                        if ($oldFile && file_exists($oldFile) && strpos($oldFile, 'dummy.jpg') === false) {
                            unlink($oldFile);
                        }

                        $stmtUpdate = $conn->prepare("UPDATE uploads SET file = ? WHERE id = ?");
                        if ($stmtUpdate) {
                            $stmtUpdate->bind_param("si", $uploadPath, $existingId);
                            if ($stmtUpdate->execute()) {
                                $imageSrc = $uploadPath;
                            } else {
                                $errors[] = "DB update error: " . $stmtUpdate->error;
                            }
                            $stmtUpdate->close();
                        } else {
                            $errors[] = "DB prepare failed for update: " . $conn->error;
                        }
                    } else {
                        // No existing image, insert new record
                        $stmtInsert = $conn->prepare("INSERT INTO uploads (user_id, file) VALUES (?, ?)");
                        if ($stmtInsert) {
                            $stmtInsert->bind_param("is", $user_id, $uploadPath);
                            if ($stmtInsert->execute()) {
                                $imageSrc = $uploadPath;
                            } else {
                                $errors[] = "DB insert error: " . $stmtInsert->error;
                            }
                            $stmtInsert->close();
                        } else {
                            $errors[] = "DB prepare failed for insert: " . $conn->error;
                        }
                    }
                    $stmtCheck->close();
                } else {
                    $errors[] = "DB prepare failed for check: " . $conn->error;
                }

                } else {
                    $errors[] = "Failed to move uploaded file.";
                }
            } else {
                $errors[] = "Invalid file extension: $ext";
            }
        }
    } else {
        // Load latest image from DB if no upload
        $stmt = $conn->prepare("SELECT file FROM uploads WHERE user_id = ? ORDER BY id DESC LIMIT 1");
        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($savedFile);
            if ($stmt->fetch()) {
                $imageSrc = $savedFile;
            }
            $stmt->close();
        }
    }
} else {
    $errors[] = "No user ID in session.";
}

$fullNameProfile = isset($_SESSION['full_name']) ? $_SESSION['full_name'] : "Guest";
$id_noProfile = isset($_SESSION['id_no']) ? $_SESSION['id_no'] : "N/A";
?>

<!-- At the top of your HTML or wherever you want to show errors: -->
<?php if (!empty($errors)) : ?>
    <div style="background: #fdd; padding: 1em; margin-bottom: 1em; border: 1px solid #f00;">
        <strong>Errors:</strong>
        <ul>
            <?php foreach ($errors as $err) : ?>
                <li><?= htmlspecialchars($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
