<?php
session_start();
?>
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
        <?php
        if (!empty($_SESSION['signup_messages'])) {
            foreach ($_SESSION['signup_messages'] as $m) {
                echo '<script>alert(' . json_encode($m) . ');</script>';
            }
            unset($_SESSION['signup_messages']);
        }
        ?>
        
        <!-- Sign Up Form -->
        <form method="POST" action="../BackEnd/signup.php">
            <input type="text" id="username" name="name" placeholder="Username" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
        
        <!-- Login Link -->
        <p>Already have an account? <a href="index.php">Login here</a></p>
    </div>
    
    <?php include 'footer.php';?>
</body>
</html>
