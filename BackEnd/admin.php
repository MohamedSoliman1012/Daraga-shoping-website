<?php
// Include database connection
include 'db.php';
session_start();

// Check if admin is trying to delete a user by ID
if (isset($_GET['delete_user_id'])) {
    $user_id = intval($_GET['delete_user_id']);
    // Prepare the delete query using prepared statements
    $stmt = $conn->prepare('DELETE FROM users WHERE user_id = ?');
    // Bind the user_id and execute
    $stmt->bind_param('i', $user_id);
    if ($stmt->execute()) {
        // Success - set a message and redirect
        $_SESSION['admin_message'] = 'User deleted successfully.';
        header('Location: ../admin-panel/adminUsers.php');
    } else {
        // Failed - set error message and redirect
        $_SESSION['admin_message'] = 'Failed to delete user.';
        header('Location: ../admin-panel/adminUsers.php');
    }
    $stmt->close();
    exit;
}

?>