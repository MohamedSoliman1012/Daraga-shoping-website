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
        <div class="cart-items">
            <table>
             <tbody >
                <tr>
                    <td><img src="../images/bikes/city/4.jpg" alt="notfound"></td>
                    <td><h2>BTWIN 26</h2></td>
                    <td><p>24,499$</p></td>
                </tr>
            </tbody>
            </table>
        </div>
         <div class="cart-items">
            <table>
             <tbody >
                <tr>
                    <td><img src="../images/Tools/Multitool Bicycle Repair Kit Multi 16 Tools in One.jpg" alt="notfound"></td>
                    <td>  <h2>Multi-Tool</h2></td>
                    <td><p>25$</p></td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="order-sum">
            <table>
                <tr>
                    <td><label>Tax :</label></td>
                    <td> <p>145$</p></td>
                </tr>
                <tr>
                    <td><label>Total :</label></td>
                    <td> <p>24,669$</p></td>
                </tr>
                
            </table>
            
           
            
        </div>

        <div class="cart-buttons">
            <button id="continue-shopping" onclick="continueBtn()">Continue shopping</button>
            <button id="checkout" onclick="checkout()">checkout</button>

        </div>
    </div>

    <!-- Footer Section -->
            <?php include 'footer.php';?>
</body>

</html>