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
    
    <style>
        .orders-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 40px;
        }

        /* Simple Card Style */
        .simple-card {
            background-color: var(--second); /* Dark Grey */
            color: var(--main);              /* White Text */
            width: 300px;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #444;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        /* 1. User Name */
        .user-name {
            font-size: 1.4em;
            font-weight: bold;
            color: var(--rare); /* Gold Color */
            margin-bottom: 10px;
            display: block;
            text-transform: capitalize;
        }

        .label {
            font-size: 0.8em;
            color: #aaa;
            margin-bottom: 5px;
            display: block;
        }

        /* Status Style */
        .order-status {
            font-weight: bold;
            color: #fff;
            background-color: #555;
            padding: 5px 10px;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 0.9em;
            display: inline-block;
            margin-bottom: 15px;
        }

        /* 2. Total Price */
        .total-price {
            font-size: 2em;
            color: var(--buy); /* Green Color */
            font-weight: bold;
            display: block;
            border-top: 1px solid #555;
            padding-top: 15px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php include 'header.php';?>

    <h1 class="page-title">Your Orders</h1>

    <div class="orders-container">
        <?php
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_order = mysqli_fetch_assoc($select_orders)){
        ?>
            <div class="simple-card">
                
                <div>
                    <span class="label">Customer Name</span>
                    <span class="user-name"><?php echo htmlspecialchars($fetch_order['name']); ?></span>
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
            echo '<p style="text-align:center; width:100%; color:#555;">No orders found.</p>';
        }
        ?>
    </div>

    <?php include 'footer.php';?>
</body>
</html>