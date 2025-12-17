<?php
// Include database connection
include '../BackEnd/db.php';
session_start();

// Make sure only logged-in admins can see this page
if(!isset($_SESSION['user_id'])){
    header('location:../user-validation/index.php');
    exit;
}

// =============== DASHBOARD LOGIC ===============

// Calculate the total revenue from completed orders
$total_completed = 0;
$select_completed = mysqli_query($conn, "SELECT SUM(total_price) AS total_payment FROM orders WHERE status = 'completed'") or die('query failed');
$fetch_completed = mysqli_fetch_assoc($select_completed);
if($fetch_completed['total_payment'] > 0){
    $total_completed = $fetch_completed['total_payment'];
}

// Count how many orders have been placed so far
$select_orders = mysqli_query($conn, "SELECT * FROM orders") or die('query failed');
$number_of_orders = mysqli_num_rows($select_orders);

// Count how many products are in the inventory
$select_products = mysqli_query($conn, "SELECT * FROM products") or die('query failed');
$number_of_products = mysqli_num_rows($select_products);

// Count how many users (customers) have registered
$select_users = mysqli_query($conn, "SELECT * FROM users") or die('query failed');
$number_of_users = mysqli_num_rows($select_users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <script src="../js/AdminScript.js"></script>
</head>

<body>

    <?php include 'header-admin.php';?>

    <h1>DASHBOARD</h1>

    <div class="box-container">

        <div class="box">
            <h3>$<?php echo number_format($total_completed); ?>/-</h3>
            <p>Completed Payments</p>
        </div>

        <div class="box" onclick="orderspage()" style="cursor: pointer;">
            <h3><?php echo $number_of_orders; ?></h3>
            <p>Order Placed</p>
        </div>

        <div class="box" onclick="addedproduct()" style="cursor: pointer;">
            <h3><?php echo $number_of_products; ?></h3>
            <p>Products Added</p>
        </div>

        <div class="box" onclick="userspage()" style="cursor: pointer;">
            <h3><?php echo $number_of_users; ?></h3>
            <p>Total Users</p>
        </div>

    </div>
</body>

</html>