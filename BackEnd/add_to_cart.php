<?php
include 'db.php';
session_start();

if (isset($_POST['add_to_cart'])) {
    
    if (!isset($_SESSION['user_id'])) {
        echo "<script>
        alert('Please login first!');
        window.location.href='../user-validation/index.php';
        </script>";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $price = $_POST['product_price'];
    $image = $_POST['product_image'];
    $category = $_POST['product_category'];
    
    if(isset($_POST['product_quantity'])){
        $quantity = $_POST['product_quantity'];
    } else {
        $quantity = 1;
    }

    $check_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'");

    if (mysqli_num_rows($check_cart) > 0) {
        
        $row = mysqli_fetch_array($check_cart);
        $current_quantity = $row['quantity'];
        $new_quantity = $current_quantity + $quantity;

        $update_query = "UPDATE cart SET quantity = '$new_quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
        
        if(mysqli_query($conn, $update_query)) {
            echo "<script>alert('Product quantity updated!'); window.location.href='../user-panel/shopping-cart.php';</script>";
        } else {
            die(mysqli_error($conn));
        }

    } else {
        $insert_query = "INSERT INTO cart (user_id, product_id, name, price, image, category, quantity) 
                         VALUES ('$user_id', '$product_id', '$name', '$price', '$image', '$category', '$quantity')";
        
        if (mysqli_query($conn, $insert_query)) {
            echo "<script>alert('Added to cart!'); window.location.href='../user-panel/shopping-cart.php';</script>";
        } else {
            die(mysqli_error($conn));
        }
    }
}
?>