<?php
include 'db.php';
session_start();

if (isset($_POST['add_to_cart'])) {
    
    // 1. Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please login first!'); window.location.href='../user-validation/index.php';</script>";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = $_POST['product_price'];
    $image = $_POST['product_image'];
    $category = $_POST['product_category'];
    
    // Capture Quantity (Default to 1 if not set)
    $quantity = isset($_POST['product_quantity']) ? (int)$_POST['product_quantity'] : 1;

    // 2. Check if this specific product is ALREADY in the cart for this user
    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'");

    if (mysqli_num_rows($check_cart) > 0) {
        // --- THE FIX: UPDATE LOGIC ---
        // If it exists, we don't insert. We UPDATE the quantity column.
        
        // First, fetch the current quantity to make sure we are adding to it
        $row = mysqli_fetch_assoc($check_cart);
        $current_quantity = $row['quantity'];
        $new_quantity = $current_quantity + $quantity;

        $update_query = "UPDATE cart SET quantity = '$new_quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
        
        if(mysqli_query($conn, $update_query)) {
            echo "<script>alert('Product quantity updated!'); window.location.href='../user-panel/shopping-cart.php';</script>";
        } else {
            die('Update Failed: ' . mysqli_error($conn));
        }

    } else {
        // --- INSERT LOGIC (First time adding) ---
        $insert_query = "INSERT INTO cart (user_id, product_id, name, price, image, category, quantity) 
                         VALUES ('$user_id', '$product_id', '$name', '$price', '$image', '$category', '$quantity')";
        
        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Added to cart!'); window.location.href='../user-panel/shopping-cart.php';</script>";
        } else {
            die('Insert Failed: ' . mysqli_error($conn));
        }
    }
}
?>