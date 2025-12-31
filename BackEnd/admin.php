<?php
include 'db.php';
session_start();

if (isset($_GET['delete_user_id'])) {
    $user_id = $_GET['delete_user_id'];
    
    $query = "DELETE FROM users WHERE user_id = '$user_id'";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['admin_message'] = 'User deleted successfully.';
        header('Location: ../admin-panel/adminUsers.php');
    } else {
        $_SESSION['admin_message'] = 'Failed to delete user.';
        header('Location: ../admin-panel/adminUsers.php');
    }
    exit;
}
?>