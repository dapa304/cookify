<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once '../db.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit();
    }

    $profile_image = $_FILES["profile_image"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($profile_image);
    
    if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password, profile_image) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $target_file);

        if ($stmt->execute()) {
            header("Location: index.php?signup_success=1"); 
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        header("Location: index.php?signup_error=1"); 
    }

    $conn->close();
}
?>
