<?php
include 'db.php';
session_start();

if(isset($_POST['submit_order'])){
    
    // 1. Security Check
    if(!isset($_SESSION['user_id'])){
        header('location:../user-validation/index.php');
        exit;
    }
    $user_id = $_SESSION['user_id'];

    // 2. Receive Form Data (Sanitize inputs to prevent SQL errors)
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    
    // 3. Receive the Final Total Price (Calculated in checkout.php)
    $total_price = $_POST['total_price'];
    
    // 4. Set Default Status and Date
    $status = 'pending';
    $placed_on = date('d-M-Y');

    // 5. Insert into Database
    // Columns match your database structure exactly
    $insert_query = "INSERT INTO orders (user_id, name, email, phone, address, city, payment_method, total_price, status, placed_on) 
                     VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$city', '$method', '$total_price', '$status', '$placed_on')";
    
    $result = mysqli_query($conn, $insert_query);

    if($result){
        // 6. SUCCESS: Clear the User's Cart
        // Now that the order is placed, we empty their shopping cart
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
        
        echo "<script>
                alert('Order placed successfully!');
                window.location.href='../user-panel/orders.php'; 
              </script>";
    } else {
        die('Query Failed: ' . mysqli_error($conn));
    }

} else {
    // If someone tries to open this file directly without submitting the form
    header('location:../user-panel/home.php');
}
?>