<?php 
// Include database connection
include '../BackEnd/db.php';
session_start();
// Fetch all products in the 'accessories' category from the database
$select_products = mysqli_query($conn, "SELECT * FROM products WHERE category = 'accessories'") or die('Query failed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Accessories</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <?php include 'header.php';?>
    <h1>Accessories</h1>
    <div class="category">
        <?php if (mysqli_num_rows($select_products) > 0): ?>
            <?php while ($fetch_product = mysqli_fetch_assoc($select_products)): ?>
                <div class="product" onclick="window.location.href='itemPage.php?id=<?php echo $fetch_product['id']; ?>'">
                    <img src="../images/accessories/<?php echo $fetch_product['image']; ?>" alt="accessory">
                    <table>
                        <tr>
                            <td><?php echo htmlspecialchars($fetch_product['name']); ?></td>
                            <td class="price"><?php echo number_format($fetch_product['price']); ?>$</td>
                        </tr>
                    </table>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align:center; width:100%;">No accessories found.</p>
        <?php endif; ?>
    </div>
    <?php include 'footer.php';?>
</body>
</html>