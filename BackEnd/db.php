<?php
// Database connection - set up mysqli connection to the daraga_shop database
$conn = new mysqli('localhost', 'root', '', 'daraga_shop');

// Check if the connection failed and bail if it did
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>