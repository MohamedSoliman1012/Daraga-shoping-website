<?php 
// Include database connection
include '../BackEnd/db.php';
session_start();

// Make sure user is logged in before viewing cart
if(!isset($_SESSION['user_id'])){
    // If not logged in, redirect to login page
    header('location:../user-validation/index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$grand_total = 0;

// Fetch all items currently in this user's shopping cart
$select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('Query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1200">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>
<body>
    
    <?php include 'header.php';?>

    <h1>Shopping Cart</h1> 

    <div class="cart-details">
        <h1>Cart details</h1>
        
        <?php
        // 3. Check if cart is not empty
        if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                
                // MATH: Calculate subtotal for this item (Price * Quantity)
                // If 'quantity' column doesn't exist yet, it defaults to 1 in calculation logic
                $quantity = isset($fetch_cart['quantity']) ? $fetch_cart['quantity'] : 1;
                $sub_total = $fetch_cart['price'] * $quantity;
                $grand_total += $sub_total;
        ?>
        <div class="cart-items">
            <table>
                <tbody>
                    <tr>
                        <td><img src="../images/<?php echo $fetch_cart['category']; ?>/<?php echo $fetch_cart['image']; ?>" alt="product" width="100"></td>
                        
                       
                        
                        <td>
                            <p><?php echo number_format($fetch_cart['price']); ?>$ x <?php echo $quantity; ?></p>
                            <p style="font-weight: bold; color: #afa6a6ff;">= <?php echo number_format($sub_total); ?>$</p>
                        </td>
                        
                        <td>
                            <a href="../BackEnd/remove_item.php?id=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Remove this item from cart?');" style="color: red; text-decoration: none; border: 1px solid red; padding: 5px 10px; border-radius: 5px;">Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
            }
        } else {
            echo '<div style="text-align:center; padding:50px; font-size: 20px;">Your cart is empty!</div>';
        }
        ?>

        <?php if($grand_total > 0){ ?>
        <div class="order-sum">
            <table>
                <tr>
                    <td><label>Subtotal :</label></td>
                    <td><p><?php echo number_format($grand_total); ?>$</p></td>
                </tr>
                <tr>
                    <?php 
                        // Example Tax Calculation (e.g., 5% or 14%)
                        $tax = $grand_total * 0.14; 
                        $final_total = $grand_total + $tax;
                    ?>
                    <td><label>Tax (14%) :</label></td>
                    <td><p><?php echo number_format($tax); ?>$</p></td>
                </tr>
                <tr>
                    <td><label style="font-weight: bold; font-size: 18px;">Total :</label></td>
                    <td><p style="font-weight: bold; font-size: 18px; color: green;"><?php echo number_format($final_total); ?>$</p></td>
                </tr>
            </table>
        </div>

        <div class="cart-buttons">
            <button id="continue-shopping" onclick="window.location.href='home.php'">Continue Shopping</button>
            <button id="checkout" onclick="window.location.href='checkout.php'">Checkout</button>
        </div>
        <?php } else { ?>
            <div class="cart-buttons" style="justify-content: center;">
                <button id="continue-shopping" onclick="window.location.href='home.php'">Start Shopping</button>
            </div>
        <?php } ?>
        
    </div>

    <?php include 'footer.php';?>
</body>
</html>