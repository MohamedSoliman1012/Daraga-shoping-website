<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Bicycles</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js" ></script>
</head>
<body>
    <!-- Header Section -->
    <?php include 'header.php';?>



  <h1 >Bicycles</h1>

  <div class="category">

       <div class="product" onclick="itempage()">
            <img src="../images/bikes/city/4.jpg" alt="">
            <table>
                <tr>
                    <td>BTWIN 26</td>
                    <td class="price">24,499$</td>
                </tr>
            </table>

        </div>


        <div class="product">
            <img src="../images/bikes/city/1.jpg" alt="">
            <table>
                <tr>
                    <td>Forever 24</td>
                    <td class="price">7,999$</td>
                </tr>
            </table>

        </div>
            

      <div class="product">
            <img src="../images/bikes/city/3.jpg" alt="">
            <table>
                <tr>
                    <td>Zoom 20</td>
                    <td class="price">7,403$</td>
                </tr>
            </table>

        </div>
    
  </div>

    <!-- Footer Section -->
            <?php include 'footer.php';?>
</body>
</html>