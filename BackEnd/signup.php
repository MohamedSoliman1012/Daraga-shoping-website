    <?php
    session_start();
    include 'db.php';

    $messages = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirmPassword'] ?? '';

        if ($name === '' || $email === '' || $password === '' || $confirm === '') {
            echo '<script>alert("please fill all fields 3ashan ta3bna");</script>';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Please provide a valid email address.");</script>';
        }

        if ($password !== $confirm) {
            echo '<script>alert("Passwords do not match");</script>';
        }

        if (empty($messages)) {
            // Check if email already exists (only by email)
            $stmt = $conn->prepare('SELECT user_id FROM users WHERE email = ?');
            if ($stmt === false) {
                $messages[] = 'Database error: failed to prepare statement.';
            } else {
                $stmt->bind_param('s', $email);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0) {
                    $messages[] = 'Email is already registered.';
                } else {

                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $ins = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
                    if ($ins === false) {
                        $messages[] = 'Database error: failed to prepare insert.';
                    } else {
                        $ins->bind_param('sss', $name, $email, $hash);
                        if ($ins->execute()) {
                            // Registration successful: redirect to login
                            $_SESSION['signup_messages'] = ['Registration successful. You may now log in.'];
                            header('Location: ../user-validation/index.php');
                            exit;
                        } else {
                            $messages[] = 'Registration failed. Please try again.';
                        }
                    }
                }
                $stmt->close();
            }
        }

        // store messages and redirect back to signup form
        $_SESSION['signup_messages'] = $messages;
        header('Location: ../user-validation/signup.php');
        exit;
    }

    ?>
 