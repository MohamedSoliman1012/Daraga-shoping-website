<?php
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['email'];
    $passInput  = $_POST['password'];

    // 1. Hardcoded Admin Check
    if ($emailInput === 'admin@daraga.com' && $passInput === 'admin') {
        $_SESSION['username'] = 'Super Admin';
        header("Location: ../admin-panel/adminHome.php");
        exit();
    }

    // 2. Database Check: We check BOTH email AND password in the SQL
    $sql = "SELECT username FROM users WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $emailInput, $passInput);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // If the query returns a row, the email AND password are correct
        if ($user = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $user['username'];
            echo "<script>alert('Login Successful!'); window.location.href='../user-panel/home.php';</script>";
        } else {
            // No match found
            echo "<script>alert('Invalid email or password!'); window.history.back();</script>";
        }
    }
}
?>