<?php
// Suppress mysqli errors (we'll handle them ourselves)
mysqli_report(MYSQLI_REPORT_OFF);
include 'db.php';

// Only process if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Grab form inputs
    $user = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $conf = $_POST['confirmPassword'];

    // Make sure passwords match before doing anything
    if ($pass !== $conf) {
        echo "<script>alert('Error: Passwords do not match!'); window.history.back();</script>";
        exit();
    }

    // Check if this email or username already exists in the database
    $check = mysqli_prepare($conn, "SELECT username FROM users WHERE email = ? OR username = ?");
    
    // Make sure the query prepared OK
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
        // If we get here, the query broke - tell the user what's wrong
        die("Database Error: " . mysqli_error($conn));
    }

    // All checks passed - now actually insert the new user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the variables and execute the insert query
        mysqli_stmt_bind_param($stmt, "sss", $user, $email, $pass);
        if (mysqli_stmt_execute($stmt)) {
            // Success! Tell the user and redirect to login
            echo "<script>
                    alert('Registration successful!');
                    window.location.href='../user-validation/index.php';
                  </script>";
        } else {
            echo "<script>alert('Error: Execution failed.'); window.history.back();</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        // Something went wrong with the prepare statement
        die("Insert Prepare Error: " . mysqli_error($conn));
    }
}
// Close the database connection
mysqli_close($conn);
?>