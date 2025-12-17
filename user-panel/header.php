  <header class="header">
        <a href="home.php" class="logo">DARAGA</a>
        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="bicycles.php">Bicycles</a>
            <a href="repair.php">Repair Tools</a>
            <a href="accessories.php">Accessories</a>
            <a href="shopping-cart.php">Shopping Cart</a>
            <a href="orders.php">Your Orders</a>
        </nav>
        <div class="icons">
            <a href="#" id="logout-icon" onclick="logout()">👤</a>
        </div>
    </header>

<!-- Fallback logout in case page didn't load navigation.js -->
<script>
if (typeof logout === 'undefined') {
    function logout(){
        if(confirm('Are you sure you want to log out?')){
            window.location.href = '../BackEnd/logout.php';
        }
    }
}
</script>