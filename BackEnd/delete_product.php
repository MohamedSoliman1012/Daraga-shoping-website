<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete by 'pid'
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        
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
mysqli_close($conn);
?>