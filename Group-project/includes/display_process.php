<?php
/*
 * This file is created by Guanchen Zhu for the work on group Assignment.
 */

session_start();
require_once "db.php";

if (isset($_POST['add-cart'])) {

    $product_id = $_POST['add-cart'];
    $user_id = $_SESSION['userid'];

    // Set up the query
    $submitSQL = "INSERT INTO `cart`(`product_id`, `user_id`) 
            VALUES ('{$product_id}','{$user_id}')";

    // Execute query
    $conn->query($submitSQL);

    // display the product with the id
    header("Location: ../display.php?id=" . $product_id);
} else {
    header("Location: ../index.php");
}
?>