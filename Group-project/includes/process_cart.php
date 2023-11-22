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

    // Set up the query
    $deleteSQL = "DELETE FROM cart WHERE product_id=" . $product_id;

    // Execute query
    $conn->query($deleteSQL);

    die();
}


// Send the data back to client
if(isset($_GET['identifier'])) {
    require_once "cart_display.php";
    die();
}

?>