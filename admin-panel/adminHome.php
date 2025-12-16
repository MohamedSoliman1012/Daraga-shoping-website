<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <script src="../js/AdminScript.js"></script>
</head>

<body>

    <?php include 'header-admin.php';?>


    <h1>DASHBOARD</h1>

    <div class="box-container">


        <div class="box">
            <h3>$3,200/-</h3>
            <p>Completed Payments</p>
        </div>

        <div class="box" onclick="orderspage()">
            <h3>12</h3>
            <p>Order Placed</p>
        </div>

        <div class="box" onclick="addedproduct()">
            <h3>45</h3>
            <p>Products Added</p>
        </div>


        <div class="box" onclick="userspage()">
            <h3>23</h3>
            <p>Total Users</p>
        </div>

    </div>
</body>

</html>