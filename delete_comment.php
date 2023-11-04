<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login/"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

// Handle the comment deletion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment_id = $_POST['comment_id'];

    // Query the comment to verify ownership
    $commentSql = "SELECT user_id FROM comments WHERE id = $comment_id";
    $commentResult = $conn->query($commentSql);

    if ($commentResult->num_rows == 1) {
        $commentRow = $commentResult->fetch_assoc();

        if ($_SESSION["id"] == $commentRow['user_id']) {
            // Delete the comment if the logged-in user is the commenter
            $deleteCommentSql = "DELETE FROM comments WHERE id = $comment_id";

            if ($conn->query($deleteCommentSql) === TRUE) {
                // Redirect back to the post detail page after deletion
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                echo "Error deleting comment: " . $conn->error;
            }
        } else {
            echo "You do not have permission to delete this comment.";
        }
    } else {
        echo "Comment not found.";
    }
}

$conn->close();
?>
