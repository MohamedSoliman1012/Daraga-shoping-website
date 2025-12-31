<?php 
include '../BackEnd/db.php';
session_start();

$select_products = mysqli_query($conn, "SELECT * FROM products") or die(mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <script src="../js/AdminScript.js"></script>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <style>
        
    </style>
</head>
<body>

    <?php include 'header-admin.php';?>

    <h1>SHOP PRODUCTS</h1>

    <div class="add-product-container">
        <div class="add-product-form">
            <h3>ADD PRODUCT</h3>
            <form action="../BackEnd/add_product.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="p_name" placeholder="Enter product name" class="box" required>
                <input type="number" name="p_price" min="0" placeholder="Enter product price" class="box" required>
                <textarea name="p_details" placeholder="Enter product details" class="box" rows="5" required></textarea> 
                <input type="file" name="p_image" class="box" accept="image/jpg, image/jpeg, image/png" required>
                <select name="p_category" class="box" required>
                    <option value="bikes">bicycles</option>
                    <option value="Tools">repair</option>
                    <option value="accessories">accessories</option>
                </select>
                <br>
                <button type="submit" name="add_product" class="box">Add product</button>
            </form>
        </div>
    </div>

    <div class="added-products">
        <h1 id="Added-product">Added Products</h1>
        <div class="product-box-container">
            <?php
            // LECTURE STYLE: Check row count
            if (mysqli_num_rows($select_products) > 0) {
                // LECTURE STYLE: Fetch as array
                while ($fetch_products = mysqli_fetch_array($select_products)) {
            ?>
                <div class="product">
                    <img src="../images/<?php echo $fetch_products['category']; ?>/<?php echo $fetch_products['image']; ?>" alt="product image">
                    
                    <table>
                        <tr>
                            <td><?php echo htmlspecialchars($fetch_products['name']); ?></td>
                            <td class="price"><?php echo number_format($fetch_products['price']); ?>$</td>
                        </tr>
                    </table>
                    
                    <button class="delete-btn" onclick="delproduct(<?php echo $fetch_products['id']; ?>)">
                        Delete Product
                    </button>
                </div>
            <?php
                }
            } else {
                echo '<p class="no-data-msg">No products added yet.</p>';
            }
            ?>
        </div>
    </div>

    <script>
    function delproduct(pid) {
        if (confirm("Are you sure you want to delete this product?")) {
            window.location.href = "../BackEnd/delete_product.php?id=" + pid;
        }
    }
    </script>
</body>
</html>