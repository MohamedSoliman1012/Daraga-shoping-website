<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <link rel="stylesheet" href="../styles/AdminStyle.css">
    <script src="../js/AdminScript.js" ></script>
</head>

<body>

    <?php include 'header-admin.php';?>


    <h1>SHOP PRODUCTS</h1>
    <div class="add-product-container">

    <div class="add-product-form">
        <h3>ADD PRODUCT</h3>
        <form>
            <input type="text" id="addname" placeholder="Enter product name" class="box" required>
            <input type="number" id="addprice" min="0" placeholder="Enter product price" class="box" required>
           <textarea id="adddetails" placeholder="Enter product details" class="box" rows="5" required></textarea> 
            <input type="file" id="addimage" class="box" accept="image/jpg, image/jpeg, image/png">
            <select class="box">
                <option value="">bicycles</option>
                <option value="">repair</option>
                <option value="">accessories</option>
            </select>
            <br>
            <button type="button" class="box" onclick="addproduct()">Add product</button>
        </form>
    </div>

    </div>
    <div class="added-products" >
        <h1 id="Added-product">Added Products</h1>

        <div class="product">
            <img src="../images/bikes/city/4.jpg" alt="">
            <table>
                <tr>
                    <td>BTWIN 26</td>
                    <td class="price">24,499$</td>
                </tr>
            </table>
            <button class="delete-btn" onclick="delproduct()">Delete Product</button>

        </div>

        <div class="product">
            <img src="../images/bikes/city/1.jpg" alt="">
            <table>
                <tr>
                    <td>Forever 24</td>
                    <td class="price">7,999$</td>
                </tr>
            </table>
            <button class="delete-btn" onclick="delproduct()">Delete Product</button>

        </div>

        <div class="product">
            <img src="../images/bikes/city/3.jpg" alt="">
            <table>
                <tr>
                    <td>Zoom 20</td>
                    <td class="price">7,403$</td>
                </tr>
            </table>
            <button class="delete-btn" onclick="delproduct()">Delete Product</button>

        </div>
        <div class="product">
            <img src="../images/Tools/Gunpla 46 Piece  Drive Socket Wrench Driver.jpg" alt="">
            <table>
                <tr>
                    <td>Socket Kit</td>
                    <td class="price">40$</td>
                </tr>
            </table>
            <button class="delete-btn" onclick="delproduct()">Delete Product</button>

        </div>
        <div class="product">
            <img src="../images/Tools/Cycling Motorcycle Bicycle Chain Crankset Brush.jpg" alt="">
            <table>
                <tr>
                    <td>Chain Brush</td>
                    <td class="price">10$</td>
                </tr>
            </table>
            <button class="delete-btn" onclick="delproduct()">Delete Product</button>

        </div>

    </div>


</body>

</html>