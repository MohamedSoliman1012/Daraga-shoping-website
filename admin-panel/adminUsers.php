<?php 
include '../BackEnd/db.php';
session_start();

$query = "SELECT user_id, username, email FROM users";
$result = mysqli_query($conn, $query);

if (!$result) {
    die(mysqli_error($conn));
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
        <?php if (mysqli_num_rows($result) == 0): ?>
            <p class="no-data-msg">No users found.</p>
        <?php else: ?>
            <?php while ($row = mysqli_fetch_array($result)): ?>
                <div class="box">
                    <table class="users-table">
                        <tr>
                            <th>User Name :</th>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                        </tr>
                    </table>
                    
                    <button class="delete-btn" onclick="deluser(<?php echo $row['user_id']; ?>)">
                        Delete User
                    </button>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <script>
    function deluser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "../BackEnd/delete_user.php?id=" + userId;
        }
    }
    </script>

</body>
</html>