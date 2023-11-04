<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login/"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

// Handle the comment submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["id"];
    $post_id = $_POST['post_id'];
    $comment = $_POST['comment'];

    // Insert the comment into the database
    $insertCommentSql = "INSERT INTO comments (user_id, post_id, comment) VALUES ($user_id, $post_id, '$comment')";

    if ($conn->query($insertCommentSql) === TRUE) {
        header("Location: detail.php?id=$post_id"); // Redirect back to the post detail page
        exit();
    } else {
        echo "Error adding comment: " . $conn->error;
    }
}

$conn->close();
?>
