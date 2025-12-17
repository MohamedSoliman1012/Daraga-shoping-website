<?php
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize basic inputs
    $emailInput = mysqli_real_escape_string($conn, $_POST['email']);
    $passInput  = $_POST['password'];
    
    // Capture the radio button selection ('user' or 'admin')
    $roleInput  = isset($_POST['radio']) ? $_POST['radio'] : '';

    // 1. Hardcoded Admin Check
    if ($emailInput === 'admin@daraga.com' && $passInput === 'admin') {
        if ($roleInput === 'admin') {
            $_SESSION['username'] = 'Super Admin';
            $_SESSION['role'] = 'admin';
            // Note: Admin typically doesn't need a user_id for cart operations
            header("Location: ../admin-panel/adminHome.php");
            exit();
        } else {
            echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
            exit();
        }
    }

    // 2. Database Check for Regular Users
    if ($roleInput === 'user') {
        // UPDATED: Added user_id to the SELECT statement to satisfy Foreign Key requirements
        $sql = "SELECT user_id, username FROM users WHERE email = ? AND password = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $emailInput, $passInput);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($user = mysqli_fetch_assoc($result)) {
                // UPDATED: Store the actual database ID into the session
                $_SESSION['user_id']  = $user['user_id']; 
                $_SESSION['username'] = $user['username'];
                $_SESSION['role']     = 'user';
                
                echo "<script>alert('Login Successful!'); window.location.href='../user-panel/home.php';</script>";
                exit();
            } else {
                echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
                exit();
            }
        }
    } else {
        // If 'admin' radio was selected but hardcoded check failed, or role is missing
        echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
        exit();
    }
}
?>