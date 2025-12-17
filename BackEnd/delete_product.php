<?php
// Include database connection
include 'db.php';

// Check if admin is trying to delete a product by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare delete query using prepared statements to prevent SQL injection
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    // Execute if the prepare worked
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        // Check if the deletion was successful
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Product deleted successfully.');
                    window.location.href='../admin-panel/adminProducts.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Could not delete product.');
                    window.location.href='../admin-panel/adminProducts.php';
                  </script>";
        }
        mysqli_stmt_close($stmt);
    }
}
// Close the database connection
mysqli_close($conn);
?>