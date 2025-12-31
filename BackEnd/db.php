<?php

$conn = mysqli_connect('localhost', 'root', '', 'daraga_shop');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>