<?php
// Include database connection
include 'db.php';

// Check if admin passed a user ID to delete
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete query using prepared statement (prevents SQL injection)
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Execute the delete
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Check if deletion was successful
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('User deleted successfully.');
                    window.location.href='../admin-panel/adminUsers.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete user.');
                    window.location.href='../admin-panel/adminUsers.php';
                  </script>";
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($conn);
?>