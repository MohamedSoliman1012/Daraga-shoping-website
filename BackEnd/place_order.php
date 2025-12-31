<?php
include 'db.php';
session_start();

if(isset($_POST['submit_order'])){
    
    if(!isset($_SESSION['user_id'])){
        header('location:../user-validation/index.php');
        exit;
    }
    $user_id = $_SESSION['user_id'];

    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $method = $_POST['method'];
    
    $total_price = $_POST['total_price'];
    
    $status = 'pending';
    
    // FIX: MySQL requires Year-Month-Day format (e.g., 2025-12-30)
    $placed_on = date('Y-m-d');

    $insert_query = "INSERT INTO orders (user_id, name, email, phone, address, city, payment_method, total_price, status, placed_on) 
                     VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$city', '$method', '$total_price', '$status', '$placed_on')";
    
    $result = mysqli_query($conn, $insert_query);

    if($result){
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
        
        echo "<script>
                alert('Order placed successfully!');
                window.location.href='../user-panel/orders.php'; 
              </script>";
    } else {
        die(mysqli_error($conn));
    }

} else {
    header('location:../user-panel/home.php');
}
?>