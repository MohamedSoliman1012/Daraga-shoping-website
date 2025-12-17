<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
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