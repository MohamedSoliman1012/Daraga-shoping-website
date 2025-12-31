<?php
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $emailInput = $_POST['email'];
    $passInput  = $_POST['password'];
    $roleInput  = isset($_POST['radio']) ? $_POST['radio'] : '';

    if ($emailInput === 'admin@daraga.com' && $passInput === 'admin') {
        if ($roleInput === 'admin') {
            $_SESSION['username'] = 'Super Admin';
            $_SESSION['role'] = 'admin';
            
            header("Location: ../admin-panel/adminHome.php");
            exit();
        } else {
            echo "<script>
            alert('Invalid email, password, or role selection.');
            window.history.back();
            </script>";
            exit();
        }
    }

    if ($roleInput === 'user') {
        
        $query = "SELECT user_id, username FROM users WHERE email = '$emailInput' AND password = '$passInput'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            
            $user = mysqli_fetch_array($result);
            
            $_SESSION['user_id']  = $user['user_id']; 
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = 'user';
            
            echo "<script>alert('Login Successful!'); window.location.href='../user-panel/home.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
            exit();
        }

    } else if ($roleInput === 'admin') {
        echo "<script>alert('Invalid email, password, or role selection.'); window.history.back();</script>";
        exit();
    } else {
        echo "<script>alert('Please select a role.'); window.history.back();</script>";
        exit();
    }
}
?>