<?php
// Include database connection
include 'db.php';
session_start();

// Only process if user clicked 'add to cart' button
if (isset($_POST['add_to_cart'])) {
    
    // First, make sure user is logged in (can't add to cart without logging in)
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please login first!'); window.location.href='../user-validation/index.php';</script>";
        exit();
    }

    // Grab all the product details from the form
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = $_POST['product_price'];
    $image = $_POST['product_image'];
    $category = $_POST['product_category'];
    
    // Get the quantity the user wants to add (default to 1 if they didn't specify)
    $quantity = isset($_POST['product_quantity']) ? (int)$_POST['product_quantity'] : 1;

    // Check if this item is already in the user's cart
    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'");

    if (mysqli_num_rows($check_cart) > 0) {
        // Item already exists - just update the quantity instead of adding a duplicate
        // Fetch current quantity and add to it
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
        // Product not in cart yet - add it as a new item
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