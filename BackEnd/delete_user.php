<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE user_id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('User deleted successfully.');
                window.location.href='../admin-panel/adminUsers.php';
              </script>";
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
mysqli_close($conn);
?>