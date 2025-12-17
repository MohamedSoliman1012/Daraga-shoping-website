    <header class="header">
        <a href="adminHome.php" class="logo">AdminPanel</a>
        <nav class="navbar">
            <a href="adminHome.php">Home</a>
            <a href="adminProducts.php">Products</a>
            <a href="adminOrders.php">Orders</a>
            <a href="adminUsers.php">Users</a>
        </nav>
        <div class="icons">
            <a href="#" id="logout-icon" onclick="logout()">👤</a>
        </div>
    </header>

    <!-- Fallback logout in case page didn't load AdminScript.js -->
    <script>
    if (typeof logout === 'undefined') {
        function logout(){
            if(confirm('Are you sure you want to log out?')){
                window.location.href = '../BackEnd/logout.php';
            }
        }
    }
    </script>