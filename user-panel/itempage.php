<?php 
// Include database connection
include '../BackEnd/db.php';
session_start();

// Check if a product ID was passed in the URL
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // Query for the product details
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // If product exists, fetch its data
    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        // Product doesn't exist - tell user and go back
        echo "<script>alert('Product not found!'); window.location.href='home.php';</script>";
        exit;
    }
} else {
    // No product ID provided - send them home
    header('location:home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>
<body>
    <?php include 'header.php';?>

    <div class="item-details-container">
        <table class="item-display-table">
            <tr>
                <td class="image-cell" rowspan="3">
                    <img src="../images/<?php echo $product['category']; ?>/<?php echo $product['image']; ?>" alt="product">              
                </td>
                <td class="text-cell title-row">
                    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                </td>
            </tr>
            <tr>
                <td class="text-cell price-row">
                    <h2><?php echo number_format($product['price']); ?>$</h2>
                </td>
            </tr>
            <tr>
                <td class="text-cell desc-row">
                    <p><?php echo htmlspecialchars($product['details']); ?></p>
                </td>
            </tr>
        </table>
    </div>

    <div class="item-btns">
        <form action="../BackEnd/add_to_cart.php" method="POST" style="display:inline;">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $product['image']; ?>">
            <input type="hidden" name="product_category" value="<?php echo $product['category']; ?>">
            <button type="submit" name="add_to_cart" class="item-btns-add">Add to cart</button>
        </form>
        <button class="item-btns-buy" onclick="window.location.href='checkout.php?buy_now=<?php echo $product['id']; ?>'">Buy Now</button>
    </div>

    <?php include 'footer.php';?>
</body>
</html>