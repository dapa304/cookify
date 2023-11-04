<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

// Check if the post ID is provided via a GET parameter
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Query the database to retrieve the post data
    $user_id = $_SESSION["id"];
    $sql = "SELECT * FROM recipes WHERE id = $post_id AND user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Delete the post from the database
        $deleteSql = "DELETE FROM recipes WHERE id = $post_id AND user_id = $user_id";
        if ($conn->query($deleteSql) === TRUE) {
            header("Location: mypost.php?success=1"); 
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "Post not found or you don't have permission to delete it.";
    }
} else {
    echo "Post ID not provided.";
}

$conn->close();
?>
