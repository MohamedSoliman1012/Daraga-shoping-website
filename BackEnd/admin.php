<?php
include 'db.php';
session_start();
$stmt = $conn->prepare('DELETE FROM users WHERE user_id = ?');
$stmt->bind_param('i', $user_id);
if ($stmt->execute()) {
    header('Location: ../admin-panel/adminUsers.php?success=' . urlencode('User deleted'));
} else {
    header('Location: ../admin-panel/adminUsers.php?error=' . urlencode('Failed to delete user'));
}
exit;

?>