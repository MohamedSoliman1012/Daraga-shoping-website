<?php 
include '../BackEnd/db.php';
session_start();

// 1. Security Check: Ensure user is logged in
if(!isset($_SESSION['user_id'])){
    // If not logged in, redirect to login page
    header('location:../user-validation/index.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$grand_total = 0;

// 2. Fetch all items in the cart for this specific user
$select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id'") or die('Query failed');
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=1200">
    <title>Shopping Cart</title>
    <script src="../js/navigation.js"></script>
    <link rel="stylesheet" href="../styles/style.css">

     <style>
         .cart-details{
    width: 40%;
    height: 40%;
    border-radius: 15px;
    background-color: var(--second);
    align-items: center;
    margin: 40px auto;
    display: block;
    padding: 20px;
    text-align: center;
   }
   .cart-details h1{
    color: var(--rare);
    }
 
    .cart-items table {
    margin: auto;
   border-bottom: 0.5px solid gray;
   
} 

.cart-items table td{
    padding: 10px;
    margin: auto;
    width: 30%;
   
}

   .cart-items img{
    border-radius: 10px;
    height: 125px;
    width: 125px;
   }
   .cart-items h2{
    font-weight: bold;
    color: var(--main);
   }
   .cart-items p{

    font-size: 1.4em;
    font-weight: bold;
    color: var(--buy);
   }
   .order-sum table{
    margin: auto;
    font-size: 1.5em;
    color: var(--rare);
   }
   .order-sum label{
    font-weight: bold;
    }
   .order-sum p{
    color: var(--main);
   }

   .cart-buttons{
    padding: 10px;
     border-top: 0.5px solid gray;
   }
   .cart-buttons button{
    font-size: large;
    font-weight: bold;
    cursor: pointer;
    padding: 10px;
    border-radius: 10px;
    background-color: var(--rare);
   }

   .cart-buttons button:hover{
    
    background-color: rgb(255, 190, 70);
   }


    </style>
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
                            <p class="subtotal-line">= <?php echo number_format($sub_total); ?>$</p>
                        </td>
                        
                        <td>
                            <a href="../BackEnd/remove_item.php?id=<?php echo $fetch_cart['id']; ?>" class="remove-btn" onclick="return confirm('Remove this item from cart?');">Remove</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php
            }
        } else {
            echo '<div class="empty-cart-msg">Your cart is empty!</div>';
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
                    <td><label class="cart-total-label">Total :</label></td>
                    <td><p class="total-price-final"><?php echo number_format($final_total); ?>$</p></td>
                </tr>
            </table>
        </div>

        <div class="cart-buttons">
            <button id="continue-shopping" onclick="window.location.href='home.php'">Continue Shopping</button>
            <button id="checkout" onclick="window.location.href='checkout.php'">Checkout</button>
        </div>
        <?php } else { ?>
            <div class="cart-buttons cart-buttons-centered">
                <button id="continue-shopping" onclick="window.location.href='home.php'">Start Shopping</button>
            </div>
        <?php } ?>
        
    </div>

    <?php include 'footer.php';?>
</body>
</html>