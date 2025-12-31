<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM products WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Product deleted successfully.');
                window.location.href='../admin-panel/adminProducts.php';
              </script>";
    } else {
        die("Error: Could not delete product. " . mysqli_error($conn));
    }
}
mysqli_close($conn);
?>