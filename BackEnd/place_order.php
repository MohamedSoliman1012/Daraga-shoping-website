<?php
// Include database connection
include 'db.php';
session_start();

// Only process if user submitted the order form
if(isset($_POST['submit_order'])){
    
    // Make sure user is logged in before placing order
    if(!isset($_SESSION['user_id'])){
        header('location:../user-validation/index.php');
        exit;
    }
    $user_id = $_SESSION['user_id'];

    // Grab all the shipping info from the checkout form and clean it up
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $method = mysqli_real_escape_string($conn, $_POST['method']);
    
    // Get the total price (already calculated in checkout.php)
    $total_price = $_POST['total_price'];
    
    // Set the order status to 'pending' and get the current date
    $status = 'pending';
    $placed_on = date('d-M-Y');

    // Now insert the order into the database
    $insert_query = "INSERT INTO orders (user_id, name, email, phone, address, city, payment_method, total_price, status, placed_on) 
                     VALUES ('$user_id', '$name', '$email', '$phone', '$address', '$city', '$method', '$total_price', '$status', '$placed_on')";
    
    $result = mysqli_query($conn, $insert_query);

    // Check if the order was saved successfully
    if($result){
        // Order was placed! Now clear out the user's shopping cart since they checked out
        mysqli_query($conn, "DELETE FROM cart WHERE user_id = '$user_id'");
        
        echo "<script>
                alert('Order placed successfully!');
                window.location.href='../user-panel/orders.php'; 
              </script>";
    } else {
        // Something went wrong with saving the order
        die('Query Failed: ' . mysqli_error($conn));
    }

} else {
    // If someone tries to access this file directly without submitting the form, send them back home
    header('location:../user-panel/home.php');
}
?>