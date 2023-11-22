<?php
/*
 * This file is created by Guanchen Zhu for the work on Group Assignment.
 */
session_start();
require_once "db.php";

/*
 *	Processes delete item requests
 */

if (isset($_POST['delete_id'])) {

    // ID of the checklist to be deleted
    $product_id = $_POST['delete_id'];

    $querySQL = "SELECT * FROM products WHERE product_id = " . $product_id;
    $result = $conn->query($querySQL);
    $row = $result->fetch_assoc();
    $file_dir = $row['picture_path'];
    unlink("../" . $file_dir);

    // Set up the query
    $deleteSQL = "DELETE FROM products WHERE product_id=" . $product_id;

    // Execute query
    $conn->query($deleteSQL);

    die();
}


// Send the data back to client
if(isset($_GET['identifier'])) {
    require_once "upload_display.php";
    die();
}

?>