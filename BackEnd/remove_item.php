<?php
// Include database connection
include 'db.php';
session_start();

// Check if someone is trying to remove an item from their cart
if(isset($_GET['id']) && isset($_SESSION['user_id'])){
    $remove_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Delete the item, but only if it belongs to the currently logged-in user (security check)
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id' AND user_id = '$user_id'");
    
    // Redirect back to shopping cart page
    header('location:../user-panel/shopping-cart.php');
} else {
    // If they didn't provide the right info, just send them back to cart
    header('location:../user-panel/shopping-cart.php');
}
?>