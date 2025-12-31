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

    $check_query = "SELECT username FROM users WHERE email = '$email' OR username = '$user'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Error: Username or Email is already taken!'); window.history.back();</script>";
        exit();
    }

    $insert_query = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
    
    if (mysqli_query($conn, $insert_query)) {
        echo "<script>
                alert('Registration successful!');
                window.location.href='../user-validation/index.php';
              </script>";
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
mysqli_close($conn);
?>