<?php 

include '../BackEnd/db.php';
session_start();
//if (!isset($_SESSION['admin_id'])) {
//    header('Location: ../admin-validation/index.php');
//    exit;
//}
$result = $conn->query('SELECT * FROM users ');
$users = [];
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <script src="../js/AdminScript.js" ></script>
</head>

<body>

    <?php include 'header-admin.php';?>


    <h1>USER ACCOUNTS</h1>
    <?php if (empty($users)): ?>
        <p>No users found.</p>
    <?php else: ?>
        <div class="users-container">
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
                    <button class="delete-btn" onclick="deluser(<?php echo $user['user_id']; ?>)">Delete User</button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


</body>

</html>