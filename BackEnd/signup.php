<?php
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf = $_POST['confirmPassword'];

    if ($pass !== $conf) {
        echo "<script>alert('Error: Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // 1. IMPROVED CHECK: Use 'username' instead of 'id' in case 'id' doesn't exist
    $check = mysqli_prepare($conn, "SELECT username FROM users WHERE email = ? OR username = ?");
    
    // Check if the prepare actually worked
    if ($check) {
        mysqli_stmt_bind_param($check, "ss", $email, $user);
        mysqli_stmt_execute($check);
        mysqli_stmt_store_result($check);

        if (mysqli_stmt_num_rows($check) > 0) {
            echo "<script>alert('Error: Username or Email is already taken!'); window.history.back();</script>";
            mysqli_stmt_close($check);
            exit();
        }
        mysqli_stmt_close($check);
    } else {
        // This will tell you EXACTLY what is wrong with your SQL or Table
        die("Database Error: " . mysqli_error($conn));
    }

    // 2. Proceed with Insert
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $user, $email, $pass);
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
                    alert('Registration successful!');
                    window.location.href='../user-validation/index.php';
                  </script>";
        } else {
            echo "<script>alert('Error: Execution failed.'); window.history.back();</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        die("Insert Prepare Error: " . mysqli_error($conn));
    }
}
mysqli_close($conn);
?>