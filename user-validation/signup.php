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
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>
    
    <?php include 'footer.php';?>
</body>
</html>
