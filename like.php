<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login/"); 
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['like'])) {

require_once 'db.php';

    if (isset($_SESSION["id"])) {
        $recipe_id = $_POST['recipe_id'];
        $user_id = $_SESSION["id"];

        // Check if the user has already liked the post
        $sql = "SELECT COUNT(*) AS liked FROM likes WHERE recipe_id = $recipe_id AND user_id = $user_id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($row["liked"] == 0) {
            // User hasn't liked the post, increment the likes count
            $sql = "UPDATE recipes SET love = love + 1 WHERE id = $recipe_id";
            $conn->query($sql);

            // Record the like in the "likes" table to prevent multiple likes
            $sql = "INSERT INTO likes (recipe_id, user_id) VALUES ($recipe_id, $user_id)";
            $conn->query($sql);
        } else {
            // User has already liked the post, remove the like
            $sql = "UPDATE recipes SET love = love - 1 WHERE id = $recipe_id";
            $conn->query($sql);

            // Remove the like from the "likes" table
            $sql = "DELETE FROM likes WHERE recipe_id = $recipe_id AND user_id = $user_id";
            $conn->query($sql);
        }
    } else {
        header("Location: login/"); 
    }

    $conn->close();
    
    // Redirect back to the detail page or any other appropriate page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
