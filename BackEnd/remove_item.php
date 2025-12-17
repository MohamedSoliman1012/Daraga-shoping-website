<?php
include 'db.php';
session_start();

if(isset($_GET['id']) && isset($_SESSION['user_id'])){
    $remove_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Delete query ensuring the item belongs to the logged-in user
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id' AND user_id = '$user_id'");
    
    header('location:../user-panel/shopping-cart.php');
} else {
    header('location:../user-panel/shopping-cart.php');
}
?>