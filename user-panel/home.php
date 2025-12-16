<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Home Page</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/style.css">

    <!-- JavaScript -->
    <script src="../js/navigation.js"></script>
</head>

<body>
    <!-- Header Section -->
    <?php include 'header.php';?>



<h1>Categories</h1>
    <!-- Main Content: Home Page -->
    <div class="home">

        <!-- Categories Section -->
        
        <div class="category">
            <!-- Category: Bicycles -->
            <div class="category-item" onclick="bicyclespage()">
                <img src="../images/branding/categories.jpg" alt="Bicycles Category">
                <div class="name">Bicycles</div>
            </div>

            <!-- Category: Bike Repair -->
            <div class="category-item" onclick="repairpage()">
                <a href="repair.html"><img src="../images/branding/repair.jpg" alt="Bike Repair Tools"></a>
                <div class="name">Bike Repair</div>
            </div>

            <!-- Category: Accessories -->
            <div class="category-item" onclick="accessoriespage()">
                <a href="accessories.html"><img src="../images/branding/accessories.jpg" alt="Accessories"></a>
                <div class="name">Accessories</div>
            </div>
        </div>



    <?php include 'footer.php';?>

</body>

</html>