<?php 
// Include database connection
include '../BackEnd/db.php';
session_start();

// Make sure user is logged in to access checkout
if(!isset($_SESSION['user_id'])){
    header('location:../user-validation/index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$sub_total = 0;  // Subtotal before tax
$total_items = 0;

// Check if user is doing "Buy Now" for a single product
if (isset($_GET['buy_now'])) {
    $p_id = mysqli_real_escape_string($conn, $_GET['buy_now']);
    // Get the product details
    $select_p = mysqli_query($conn, "SELECT * FROM products WHERE id = '$p_id'");
    if($fetch_p = mysqli_fetch_assoc($select_p)){
        // For Buy Now, just use the product price (quantity = 1)
        $sub_total = $fetch_p['price'];
        $total_items = 1;
    }
} 
else {
    // Otherwise, calculate subtotal from all items in the shopping cart
    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'");
    while($cart_item = mysqli_fetch_assoc($select_cart)){
        // Get quantity, default to 1 if missing
        $qty = isset($cart_item['quantity']) ? $cart_item['quantity'] : 1;
        
        $sub_total += ($cart_item['price'] * $qty);
        $total_items += $qty;
    }
}

// Calculate tax (14%) and final total
$tax_amount = $sub_total * 0.14;
$final_total = $sub_total + $tax_amount;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1200">
    <title>Checkout</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>
<body>
    <?php include 'header.php';?>

    <h1>PLACE YOUR ORDER</h1>

    <div class="checkout-container">
        <form class="checkout-form" action="../BackEnd/place_order.php" method="POST">
            <div class="input-section">
                <h2>Shipping Address</h2>
                <input type="text" name="full_name" placeholder="Full Name" id="checkname" required>
                <input type="email" name="email" placeholder="Email" id="checkemail" required>
                <input type="text" name="phone" placeholder="Phone Number" id="checkphone" required>
                <input type="text" name="address" placeholder="Address" id="checkaddress" required>
                <input type="text" name="city" placeholder="City" id="checkcity" required>
            </div>
            
            <div class="input-section">
                <h2>Payment Method</h2>
                <select name="method" required>
                    <option value="cash on delivery">Cash on Delivery</option>
                    <option value="credit card">Credit Card</option>
                </select>
            </div>

            <div class="input-section">
                <h2>Order Summary</h2>
                <p><b>Total Items: </b> <?php echo $total_items; ?></p>
                
                <p><b>Subtotal: </b><?php echo number_format($sub_total); ?>$</p>
                
                <p><b>Tax (14%): </b><?php echo number_format($tax_amount); ?>$</p>
                
                <p><b>Grand Total: </b><?php echo number_format($final_total); ?>$</p>
                
                <input type="hidden" name="total_price" value="<?php echo $final_total; ?>">
            </div>

            <button type="submit" name="submit_order" class="order-btn">Complete Order</button>
        </form>
    </div>

    <?php include 'footer.php';?>
</body>
</html>