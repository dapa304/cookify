<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once '../db.php';

    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];
    $confirm_new_password = $_POST["confirm_new_password"];
    $bio = $_POST["bio"];
    
    // Check if the user wants to change the username
    if (!empty($new_username)) {
        // Perform the username update
        // You should add validation and error handling here
        $user_id = $_SESSION["id"];
        $sql = "UPDATE users SET bio = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $bio, $user_id);
        $stmt->execute();
    }

        // Check if the user wants to change the bio
        if (!empty($bio)) {
            // Perform the bio update
            // You should add validation and error handling here
            $user_id = $_SESSION["id"];
            $sql = "UPDATE users SET username = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $new_username, $user_id);
            $stmt->execute();
        }

    // Check if the user wants to change the password
    if (!empty($new_password)) {
        // Check if new password and confirmation match
        if ($new_password === $confirm_new_password) {
            // Perform the password update
            // You should add password hashing and error handling here
            $user_id = $_SESSION["id"];
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_password, $user_id);
            $stmt->execute();
        } else {
            echo "New password and confirmation do not match.";
        }
    }

    // Check if the user wants to change the profile image
    if (!empty($_FILES["new_profile_image"]["name"])) {
        // Perform the profile image update
        // You should add image upload and error handling here
        $user_id = $_SESSION["id"];
        $new_profile_image = $_FILES["new_profile_image"]["name"];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($new_profile_image);
        move_uploaded_file($_FILES["new_profile_image"]["tmp_name"], $target_file);

        $sql = "UPDATE users SET profile_image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $target_file, $user_id);
        $stmt->execute();
    }

    // Close the database connection
    $conn->close();
    
    // Redirect back to the settings page or any other appropriate page
    header("Location: ../settings.php?success=1");
}
?>
