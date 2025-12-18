<?php 
include '../BackEnd/db.php';
session_start();

// Fetch all users from the database
$result = $conn->query('SELECT user_id, username, email FROM users');
$users = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Management</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
</head>
<body>

    <?php include 'header-admin.php';?>

    <h1>USER ACCOUNTS</h1>

    <div class="users-container">
        <?php if (empty($users)): ?>
            <p class="no-data-msg">No users found.</p>
        <?php else: ?>
            <?php foreach ($users as $user): ?>
                <div class="box">
                    <table class="users-table">
                        <tr>
                            <th>User Name :</th>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                        </tr>
                    </table>
                    
                    <button class="delete-btn" onclick="deluser(<?php echo $user['user_id']; ?>)">
                        Delete User
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <script>
    // This function handles the confirmation and redirection
    function deluser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "../BackEnd/delete_user.php?id=" + userId;
        }
    }
    </script>

</body>
</html>