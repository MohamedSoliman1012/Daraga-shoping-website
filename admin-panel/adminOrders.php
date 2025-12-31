<?php
include '../BackEnd/db.php';
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    header('location:../user-validation/index.php');
    exit;
}

if(isset($_POST['update_order'])){
    $order_id = $_POST['order_id'];
    $update_status = $_POST['update_status'];
    
    $query = "UPDATE orders SET status = '$update_status' WHERE id = '$order_id'";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_affected_rows($conn) > 0){
            echo "<script>alert('Order status updated!');</script>";
        }
    } else {
        die(mysqli_error($conn));
    }
}

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    
    $query = "DELETE FROM orders WHERE id = '$delete_id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    header('location: ' . $_SERVER['PHP_SELF']);
    exit(); 
}

$select_orders = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC") or die(mysqli_error($conn));
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
                <th>Order Date</th>
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
                while($fetch_orders = mysqli_fetch_array($select_orders)){
            ?>
            <tr>
                <td>
                    <?php 
                        echo date('d-M-Y', strtotime($fetch_orders['placed_on'])); 
                    ?>
                </td>
                <td><?php echo $fetch_orders['name']; ?></td>
                <td><?php echo $fetch_orders['email']; ?></td>
                <td><?php echo $fetch_orders['phone']; ?></td>
                <td><?php echo $fetch_orders['address']; ?></td>
                <td><?php echo $fetch_orders['city']; ?></td>
                <td><?php echo $fetch_orders['payment_method']; ?></td>
                <td><?php echo number_format($fetch_orders['total_price']); ?>$</td>
                
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                        
                        <select name="update_status">
                            <option value="" selected disabled><?php echo $fetch_orders['status']; ?></option>
                            <option value="pending">Pending</option>
                            <option value="Shipped">Shipped</option>
                            <option value="completed">Completed</option>
                        </select>

                        <button type="submit" name="update_order" style="cursor: pointer; border-radius: 2px; color: #000000ff; background-color: greenyellow;">Update</button>

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