<?php
// Database connection (you will need to replace these values)
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "blog";
    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>