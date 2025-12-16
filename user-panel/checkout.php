<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=1200">
    <title>checkout</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>

<body>
    <!-- Header Section -->
    <?php include 'header.php';?>

    </header>

    <h1>PLACE YOUR ORDER</h1>

    <div class="checkout-container">
        <form class="checkout-form">
            <div class="input-section">
                <h2>Shipping Address</h2>
                <input type="text" placeholder="Full Name" id="checkname" required>
                <input type="email" placeholder="Email" id="checkemail" required>
                <input type="text" placeholder="Phone Number" id="checkphone" required>
                <input type="text" placeholder="Address" id="checkaddress" required>
                <input type="text" placeholder="City" id="checkcity" required>
            </div>
            <br>
            <div class="input-section">
                <h2>Payment Method</h2>
                <select>
                <option value="">Cash on Delivery</option>
                <option value="">Credit Card</option>
            </select>
            </div>
            <br>
            <div class="input-section">
                <h2>Order Summary</h2>
                <p><b>Total Items: </b> 2</p>
                <p><b>Total Price: </b>24,669$</p>
            </div>
            <br>
            <button type="submit" class="order-btn" onclick="placeOrder()">Complete Order</button>
        </form>
    </div>

    <!-- Footer Section -->
       <?php include 'footer.php';?>
</body>

</html>