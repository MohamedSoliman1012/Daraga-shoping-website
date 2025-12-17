<?php
// Suppress mysqli errors (we'll handle them ourselves)
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';
session_start();

// Only process if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get & clean user inputs from the login form
    $emailInput = mysqli_real_escape_string($conn, $_POST['email']);
    $passInput  = $_POST['password'];
    
    // Figure out if they picked 'user' or 'admin' from the radio buttons
    $roleInput  = isset($_POST['radio']) ? $_POST['radio'] : '';

    // 1. Check if they're trying to log in as admin (hardcoded credentials)
    if ($emailInput === 'admin@daraga.com' && $passInput === 'admin') {
        // Make sure they also selected 'admin' from the radio buttons
        if ($roleInput === 'admin') {
            // Set up the admin session
            $_SESSION['username'] = 'Super Admin';
            $_SESSION['role'] = 'admin';
            // Admin doesn't need a user_id since they're not shopping
            header("Location: ../admin-panel/adminHome.php");
            exit();
        } else {
            // They entered right credentials but picked wrong role
            echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
            exit();
        }
    }

    // 2. Look up regular users in the database
    if ($roleInput === 'user') {
        // Query for the user and grab their ID from the db
        $sql = "SELECT user_id, username FROM users WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Make sure the query prepared OK
        if ($stmt) {
            // Bind the email & password to the query (prevents SQL injection)
            mysqli_stmt_bind_param($stmt, "ss", $emailInput, $passInput);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Did we find a matching user?
            if ($user = mysqli_fetch_assoc($result)) {
                // Yep! Set up their session with their user ID and name
                $_SESSION['user_id']  = $user['user_id']; 
                $_SESSION['username'] = $user['username'];
                $_SESSION['role']     = 'user';
                
                echo "<script>alert('Login Successful!'); window.location.href='../user-panel/home.php';</script>";
                exit();
            } else {
                // Nope, bad credentials or they don't exist
                echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
                exit();
            }
        }
    } else {
        // They picked 'admin' but failed the hardcoded check, or didn't pick a role
        echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
        exit();
    }
}
?>