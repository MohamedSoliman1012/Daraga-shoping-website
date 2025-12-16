<?php
include 'db.php';
session_start();

if (isset($_GET['delete_user_id'])) {
    $user_id = intval($_GET['delete_user_id']);
    $stmt = $conn->prepare('DELETE FROM users WHERE user_id = ?');
    $stmt->bind_param('i', $user_id);
    if ($stmt->execute()) {
        $_SESSION['admin_message'] = 'User deleted successfully.';
        header('Location: ../admin-panel/adminUsers.php');
    } else {
        $_SESSION['admin_message'] = 'Failed to delete user.';
        header('Location: ../admin-panel/adminUsers.php');
    }
    $stmt->close();
    exit;
}

?>