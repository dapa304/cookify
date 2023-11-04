<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: login/"); // Redirect to the login page if not logged in
    exit();
}

require_once 'db.php';

// Handle the follow/unfollow action
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $follower_id = $_SESSION["id"];
    $followed_id = $_POST['follow_user_id'];

    // Check if the user is following
    $checkSql = "SELECT id FROM follows WHERE follower_id = $follower_id AND followed_id = $followed_id";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Unfollow: Remove the follow relationship
        $unfollowSql = "DELETE FROM follows WHERE follower_id = $follower_id AND followed_id = $followed_id";

        if ($conn->query($unfollowSql) === TRUE) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error unfollowing user: " . $conn->error;
        }
    } else {
        // Follow: Insert a new follow relationship
        $followSql = "INSERT INTO follows (follower_id, followed_id) VALUES ($follower_id, $followed_id)";

        if ($conn->query($followSql) === TRUE) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            echo "Error following user: " . $conn->error;
        }
    }
}

$conn->close();
?>
