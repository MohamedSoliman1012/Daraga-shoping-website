<?php
include '../BackEnd/db.php';
session_start();

// 1. Check if Admin is logged in
if(!isset($_SESSION['user_id'])){
    header('location:../user-validation/index.php');
    exit;
}

// 2. LOGIC: Update Order Status
if(isset($_POST['update_order'])){
    $order_id = $_POST['order_id'];
    $update_status = $_POST['update_status'];
    mysqli_query($conn, "UPDATE orders SET status = '$update_status' WHERE id = '$order_id'") or die('query failed');
    echo "<script>alert('Order status updated!');</script>";
}

// 3. LOGIC: Delete Order
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    
    // Execute Delete Query
    mysqli_query($conn, "DELETE FROM orders WHERE id = '$delete_id'") or die('query failed');
    
    // Refresh the page to show changes
    header('location: ' . $_SERVER['PHP_SELF']);
    exit(); 
}

// 4. Fetch All Orders (Newest First)
$select_orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC") or die('Query failed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <script src="../js/AdminScript.js"></script>
    <link rel="stylesheet" href="../styles/AdminStyle.css">

</head>

<body>

    <?php include 'header-admin.php';?>

    <h1>PLACED ORDERS</h1>

    <div class="order-container">
        <table>
            <tr>
                <th>Order ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>City</th>
                <th>Payment Method</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>

            <?php
            if(mysqli_num_rows($select_orders) > 0){
                while($fetch_orders = mysqli_fetch_assoc($select_orders)){
            ?>
            <tr>
                <td><?php echo $fetch_orders['id']; ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['name']); ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['email']); ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['phone']); ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['address']); ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['city']); ?></td>
                <td><?php echo htmlspecialchars($fetch_orders['payment_method']); ?></td>
                <td><?php echo number_format($fetch_orders['total_price']); ?>$</td>
                
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                        
                        <select name="update_status">
                            <option value="" selected disabled><?php echo $fetch_orders['status']; ?></option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                        </select>
                        
                        <input type="submit" name="update_order" value="Update">
                        
                        <a href="?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-link">Delete</a>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="9" class="no-data-cell">No orders placed yet!</td></tr>';
            }
            ?>

        </table>   
    </div>
    
</body>
</html>