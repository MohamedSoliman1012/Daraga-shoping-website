<?php 
include '../BackEnd/db.php';
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:../user-validation/index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$select_orders = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Your Orders</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
    
</head>

<body>
    <?php include 'header.php';?>

    <h1 class="page-title">Your Orders</h1>

    <div class="orders-container">
        <?php
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_order = mysqli_fetch_array($select_orders)){
        ?>
            <div class="simple-card">
                
                <div>
                    <span class="label">Order Date</span>
                    <span class="order-date">
                        <?php echo date('d-M-Y', strtotime($fetch_order['placed_on'])); ?>
                    </span>
                </div>

                <div>
                    <span class="label">Customer Name</span>
                    <span class="user-name"><?php echo $fetch_order['name']; ?></span>
                </div>

                <div>
                    <span class="label">Status</span>
                    <span class="order-status"><?php echo !empty($fetch_order['status']) ? $fetch_order['status'] : 'Pending'; ?></span>
                </div>
                
                <div>
                    <span class="label">Total Amount</span>
                    <span class="total-price"><?php echo number_format($fetch_order['total_price']); ?>$</span>
                </div>

            </div>
        <?php
            }
        } else {
            echo '<p class="no-items-msg">No orders found.</p>';
        }
        ?>
    </div>

    <?php include 'footer.php';?>
</body>
</html>