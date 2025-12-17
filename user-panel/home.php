<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1200">
    <title>Home Page</title>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="../js/navigation.js"></script>
</head>
<body>
    <?php include 'header.php';?>

    <h1>Categories</h1>

    <div class="home">
        <div class="category">
            <div class="category-item" onclick="bicyclespage()">
                <img src="../images/branding/categories.jpg" alt="Bicycles Category">
                <div class="name">Bicycles</div>
            </div>

            <div class="category-item" onclick="repairpage()">
                <img src="../images/branding/repair.jpg" alt="Bike Repair Tools">
                <div class="name">Bike Repair</div>
            </div>

            <div class="category-item" onclick="accessoriespage()">
                <img src="../images/branding/accessories.jpg" alt="Accessories">
                <div class="name">Accessories</div>
            </div>
        </div>
    </div>

    <?php include 'footer.php';?>
</body>
</html>