<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once '../db.php';

    // Get user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["id"] = $row["id"];
            header("Location: ../index.php"); // Redirect to the dashboard
        } else {
            header("Location: index.php?login_error=1"); 
        }
    } else {
        header("Location: index.php?login_error=1"); 
    }

    // Close the database connection
    $conn->close();
}
?>
