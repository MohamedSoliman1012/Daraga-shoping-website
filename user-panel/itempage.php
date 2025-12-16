<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>item page</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>

<body>
    <?php include 'header.php';?>


    <div class="item-details-container">
        


        <table>
        <tr>
            <td rowspan="3" >
             <img src="../images/bikes/city/4.jpg" alt="">              
            </td>
            <td class="text-cell title-row">
                <h1>BTWIN 26</h1>
            </td>
        </tr>

        <tr>
            <td class="text-cell price-row">
                <h2>24,499$</h2>
            </td>
        </tr>

        <tr>
            <td >
                <p>A premium road bike designed for serious cyclists who demand the best in
                performance, comfort, and style. Built with cutting-edge materials and precision engineering, this bike 
                delivers exceptional speed and handling on both long-distance rides and competitive racing.</p>
            </td>
        </tr>
    </table>
    </div>
        <div class="item-btns">
            <button class="item-btns-add" onclick="addtocart()">Add to cart</button>
            <button class="item-btns-buy" onclick="buynow()"> Buy Now</button>
        </div>

     <!-- Footer Section -->
            <?php include 'footer.php';?>
</body>

</html>