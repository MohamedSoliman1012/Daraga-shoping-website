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
        <form name="loginForm" id="loginForm">
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
        <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
    </div>
    
    <footer class="footer-main">
        <div class="footer-container">
            <div class="footer-section footer-brand">
                <img src="../images/branding/logo.png" alt="Daraga Logo">
                <h3 class="brand-name">DARAGA</h3>
                <p>We are three Computer Science students passionate about technology and cycling. Our project aims to create a platform that serves cyclists by connecting them with everything they need — from bikes and repair tools to accessories and spare parts.</p>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/" aria-label="Facebook">📘</a>
                        <a href="https://x.com/" aria-label="Twitter">🐦</a>
                        <a href="https://www.instagram.com/" aria-label="Instagram">📷</a>
                        <a href="https://www.youtube.com/" aria-label="YouTube">▶️</a>
                    </div>
            </div>
            
        </div>
        
        <div class="footer-bottom">
                <p>&copy; Daraga Shop | Designed with ❤️ for cyclists</p>
        </div>
    </footer>
</body>
</html>
