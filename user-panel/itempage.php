<?php 
include '../BackEnd/db.php';
session_start();

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Product not found!'); window.location.href='home.php';</script>";
        exit;
    }
} else {
    header('location:home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- <style>
    .item-details-container{
    width: 60%;
    height: 30%;
    background-color: var(--second);
    display: flex;
    gap: 20px;
    margin: 40px auto 20px auto ;
    padding: 20px;
    border-radius: 15px;

}
.item-details-container table{
    width: 100%;
    height: 100%;

}
.item-details-container table td{
   text-align: center;


}
.item-details-container img{
    border-radius: 10px;
    width: 250px;
    height: 250px;

}


.item-details-container  h1{
    margin: 0px;
    color: var(--rare); 
}
.item-details-container  h2{
    color: var(--buy); 
}

.item-details-container  p{
    color: var(--main); 
    
}



.item-btns{
    margin: 20px auto;
    
}

.item-btns-add{
    cursor: pointer;
    width: 200px;
    height: 50px;
    font-size: large;
        font-weight: bold;

    background-color: var(--rare);
    padding: 10px;
    border-radius: 10px;

}

.item-btns-add:hover{
    background-color: rgb(250, 170, 23);
}

.item-btns-buy{
    cursor: pointer;
    width: 200px;
    height: 50px;
    font-size: large;
    font-weight: bold;
    color: var(--main);
    background-color: var(--buy);
    padding: 10px;
    border-radius: 10px;

}
.item-btns-buy:hover{
    background-color: #045800;
}
</style> -->
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <script src="../js/navigation.js"></script>
        <link rel="stylesheet" href="../styles/style.css">

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
        <form action="../BackEnd/add_to_cart.php" method="POST" class="form-inline">
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