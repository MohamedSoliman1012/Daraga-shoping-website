<?php
// Include database connection
include 'db.php';

// Only process if admin submitted the product form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Grab all the product info from the form
    $name     = $_POST['p_name'];
    $price    = $_POST['p_price'];
    $details  = $_POST['p_details'];
    $category = $_POST['p_category'];

    // Handle image upload - grab the file info and set where to save it
    $image_name     = $_FILES['p_image']['name'];
    $image_tmp_name = $_FILES['p_image']['tmp_name'];
    
    // Create a folder for this product category if it doesn't exist yet
    $target_folder  = "../images/" . $category . "/";
    
    if (!is_dir($target_folder)) {
        mkdir($target_folder, 0777, true);
    }

    $target_file = $target_folder . basename($image_name);

    // Now insert the product into the database
    $sql = "INSERT INTO products (name, price, details, image, category) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sdsss", $name, $price, $details, $image_name, $category);
        
        if (mysqli_stmt_execute($stmt)) {
            // Database insert worked - now move the image file to the server
            if (move_uploaded_file($image_tmp_name, $target_file)) {
                echo "<script>alert('Product Added Successfully!'); window.location.href='../admin-panel/adminProducts.php';</script>";
            } else {
                echo "<script>alert('Product saved, but image upload failed.'); window.history.back();</script>";
            }
        } else {
            // Database insert failed
            echo "<script>alert('Error: Could not save product.'); window.history.back();</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
// Close the connection
mysqli_close($conn);
?>