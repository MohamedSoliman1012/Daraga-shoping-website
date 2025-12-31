<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['p_name'];
    $price = $_POST['p_price'];
    $details = $_POST['p_details'];
    $category = $_POST['p_category'];

    $image_name = $_FILES['p_image']['name'];
    $image_tmp_name = $_FILES['p_image']['tmp_name'];
    
    $target = "../images/" . $category . "/" . $image_name;

    $query = "INSERT INTO products (name, price, details, image, category) VALUES ('$name', '$price', '$details', '$image_name', '$category')";

    if (mysqli_query($conn, $query)) {

        if (move_uploaded_file($image_tmp_name, $target)) {
            echo "<script>
            alert('Product Added Successfully!');
            window.location.href='../admin-panel/adminProducts.php';
            </script>";
        } else {
            echo "<script>
            alert('Product saved, but image upload failed.');
            window.history.back();
            </script>";
        }
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
mysqli_close($conn);
?>