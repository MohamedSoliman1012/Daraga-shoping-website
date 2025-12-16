<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../user-validation/index.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$role = $_POST['radio'] ?? '';

if ($email === '' || $password === '') {
    header('Location: ../user-validation/index.php?error=' . urlencode('Please enter email and password'));
    exit;
}

if ($role === '' || ($role !== 'user' && $role !== 'admin')) {
    header('Location: ../user-validation/index.php?error=' . urlencode('Please select a login type'));
    exit;
}

if ($role === 'user') {
    // Check users table
    $stmt = $conn->prepare('SELECT user_id, username FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header('Location: ../user-validation/index.php?error=' . urlencode('Incorrect email or password'));
        exit;
    }
    
    $row = $result->fetch_assoc();
    // Verify password (using password_hash)
    $db_pass_stmt = $conn->prepare('SELECT password FROM users WHERE email = ?');
    $db_pass_stmt->bind_param('s', $email);
    $db_pass_stmt->execute();
    $pass_result = $db_pass_stmt->get_result();
    $pass_row = $pass_result->fetch_assoc();
    
    if (password_verify($password, $pass_row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['user_email'] = $email;
        header('Location: ../user-panel/home.php');
        exit;
    } else {
        header('Location: ../user-validation/index.php?error=' . urlencode('Incorrect email or password'));
        exit;
    }
} elseif ($role === 'admin') {
    // Check admins table
    $stmt = $conn->prepare('SELECT password FROM admins WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        header('Location: ../user-validation/index.php?error=' . urlencode('Incorrect email or password'));
        exit;
    }
    
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['admin_email'] = $email;
        header('Location: ../admin-panel/adminHome.php');
        exit;
    } else {
        header('Location: ../user-validation/index.php?error=' . urlencode('Incorrect email or password'));
        exit;
    }
}
?>
