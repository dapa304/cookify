<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login/"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

require_once 'db.php';

    $title = $_POST["title"];
    $description = $_POST["description"];
    $recipe = $_POST["recipe"];
    
    $image = $_FILES["image"]["name"];
    $target_dir = "recipe_image/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $user_id = $_SESSION["id"];

    $stmt = $conn->prepare("INSERT INTO recipes (user_id, title, description, recipe, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user_id, $title, $description, $recipe, $target_file);

    if ($stmt->execute()) {
        header("Location: mypost.php?posted=1"); 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
}
?>
