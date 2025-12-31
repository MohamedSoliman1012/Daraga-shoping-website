<?php 
include '../BackEnd/db.php';
session_start();

$select_products = mysqli_query($conn, "SELECT * FROM products WHERE category = 'bikes'") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bicycles</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php include 'header.php';?>
    <h1>Bicycles</h1>
    <div class="category">
        <?php if (mysqli_num_rows($select_products) > 0): ?>
            <?php while ($fetch_product = mysqli_fetch_array($select_products)): ?>
                <div class="product" onclick="window.location.href='itemPage.php?id=<?php echo $fetch_product['id']; ?>'">
                    <img src="../images/bikes/<?php echo $fetch_product['image']; ?>" alt="bike">
                    <table>
                        <tr>
                            <td><?php echo htmlspecialchars($fetch_product['name']); ?></td>
                            <td class="price"><?php echo number_format($fetch_product['price']); ?>$</td>
                        </tr>
                    </table>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-items-msg">No bicycles available.</p>
        <?php endif; ?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>