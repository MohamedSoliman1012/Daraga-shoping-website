<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Sign Up </title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/style.css">
    
    <!-- JavaScript -->
    <script src="../js/navigation.js" ></script>
</head>
<body>
    <!-- Header Section -->
    <?php include 'header-validation.php';?>

    
    <!-- Main Content: Sign Up Form -->
    <div class="signup-card">
        <h1>Sign Up</h1>
        
        <!-- Sign Up Form -->
        <form >
            <input type="text" id="username" placeholder="Username" required>
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Password" required>
            <input type="password" id="confirmPassword" placeholder="Confirm Password" required>
            <button type="button" onclick="Signup()">Sign Up</button>
        </form>
        
        <!-- Login Link -->
        <p>Already have an account? <a href="index.html">Login here</a></p>
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
