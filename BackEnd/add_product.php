<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture Form Data
    $name     = $_POST['p_name'];
    $price    = $_POST['p_price'];
    $details  = $_POST['p_details'];
    $category = $_POST['p_category'];

    // 2. Handle Image Upload
    $image_name     = $_FILES['p_image']['name'];
    $image_tmp_name = $_FILES['p_image']['tmp_name'];
    
    // Determine target folder based on category (optional) or use a general folder
    $target_folder  = "../images/" . $category . "/"; 
    
    // Create folder if it doesn't exist
    if (!is_dir($target_folder)) {
        mkdir($target_folder, 0777, true);
    }

    $target_file = $target_folder . basename($image_name);

    // 3. Insert into Database
    $sql = "INSERT INTO products (name, price, details, image, category) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sdsss", $name, $price, $details, $image_name, $category);
        
        if (mysqli_stmt_execute($stmt)) {
            // 4. Move uploaded file to server folder
            if (move_uploaded_file($image_tmp_name, $target_file)) {
                echo "<script>alert('Product Added Successfully!'); window.location.href='../admin-panel/adminProducts.php';</script>";
            } else {
                echo "<script>alert('Product saved, but image upload failed.'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Error: Could not save product.'); window.history.back();</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($conn);
?>