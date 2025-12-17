<?php
// Include database connection
include '../BackEnd/db.php';
session_start();

// Make sure only logged-in admins can see this page
if(!isset($_SESSION['user_id'])){
    header('location:../user-validation/index.php');
    exit;
}

// Check if admin is trying to update an order's status
if(isset($_POST['update_order'])){
    $order_id = $_POST['order_id'];
    $update_status = $_POST['update_status'];
    // Update the order status in the database
    mysqli_query($conn, "UPDATE orders SET status = '$update_status' WHERE id = '$order_id'") or die('query failed');
    echo "<script>alert('Order status updated!');</script>";
}

// Check if admin wants to delete an order
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    
    // Execute the delete query to remove the order
    mysqli_query($conn, "DELETE FROM orders WHERE id = '$delete_id'") or die('query failed');
    
    // Refresh the page to show the updated list
    header('location: ' . $_SERVER['PHP_SELF']);
    exit(); 
}

// Fetch all orders from the database, newest first
$select_orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC") or die('Query failed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <script src="../js/AdminScript.js"></script>
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
                        
                        <a href="?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" style="color:red; margin-left:5px;">Delete</a>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="9" style="text-align:center; padding:20px;">No orders placed yet!</td></tr>';
            }
            ?>

        </table>   
    </div>
    
</body>
</html>