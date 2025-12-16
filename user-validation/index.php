<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Login</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/style.css">
    
    <!-- JavaScript -->
    <script src="../js/navigation.js" ></script>
</head>
<body>
    <!-- Header Section -->
    <?php include 'header-validation.php';?>

    
    <!-- Main Content: Login Form -->
    <div class="login-card">
        <h1>Login</h1>
        
        <!-- Login Form -->
        <form action="../BackEnd/validation" id="loginForm" method="POST" >
            <input type="email" id="logemail" placeholder="Email" required>
            <input type="password" id="logpassword" placeholder="Password" required>
            
            <!-- User Role Selection -->
            <div class="role-selection">
                <label class="role-label">Login as</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" id="user" name="radio" value="user" >
                        User
                    </label>
                    <label class="radio-option">
                        <input type="radio" id="admin" name="radio" value="admin">
                       Admin
                    </label>
                </div>
            </div>
                
                <button type="button" onclick="login()">Login</button>
                
        </form>
      
        
        <!-- Sign Up Link -->
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </div>
    
    <?php include 'footer.php';?>
</body>
</html>
