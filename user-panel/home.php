<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Home Page</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/style.css">

    <!-- JavaScript -->
    <script src="../js/navigation.js"></script>
</head>

<body>
    <!-- Header Section -->
  <header class="header">
        <a href="home.html" class="logo">DARAGA</a>
        <nav class="navbar">
            <a href="home.html">Home</a>
            <a href="bicycles.html">Bicycles</a>
            <a href="repair.html">Repair Tools</a>
            <a href="accessories.html">Accessories</a>
            <a href="shopping-cart.html">Shopping Cart</a>
            <a href="orders.html">Your Orders</a>
        </nav>
        <div class="icons">
            <a href="#" id="logout-icon" onclick="logout()">👤</a>
        </div>
    </header>


<h1>Categories</h1>
    <!-- Main Content: Home Page -->
    <div class="home">

        <!-- Categories Section -->
        
        <div class="category">
            <!-- Category: Bicycles -->
            <div class="category-item" onclick="bicyclespage()">
                <img src="../images/branding/categories.jpg" alt="Bicycles Category">
                <div class="name">Bicycles</div>
            </div>

            <!-- Category: Bike Repair -->
            <div class="category-item" onclick="repairpage()">
                <a href="repair.html"><img src="../images/branding/repair.jpg" alt="Bike Repair Tools"></a>
                <div class="name">Bike Repair</div>
            </div>

            <!-- Category: Accessories -->
            <div class="category-item" onclick="accessoriespage()">
                <a href="accessories.html"><img src="../images/branding/accessories.jpg" alt="Accessories"></a>
                <div class="name">Accessories</div>
            </div>
        </div>



    <?php include 'footer.php';?>

</body>

</html>