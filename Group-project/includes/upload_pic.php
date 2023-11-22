<?php
/*
 * This picture upload php script is learned from w3schools.com and php.net
 * URL: https://www.w3schools.com/PHP/php_file_upload.asp
 * URL: https://www.php.net/manual/en/features.file-upload.post-method.php
 * Authors: w3schools.com contributors / php.net contributors
 * Date: (4 Dec 2021)
 */
session_start();
require_once "functions.php";
require_once "db.php";

$upload_photo = "../photos/" . basename($_FILES['upload-img']['name']);
$error_message = "";
$upload_error = false;

// if same name file already exists
if (file_exists($upload_photo)) {
    $upload_error = true;
    $error_message .= "Opps! Seems the file you try upload already exist, please try to change a name.\n";
}

// if file size larger than 200kb
if ($_FILES['upload-img']['size'] > 512000 && $_FILES['upload-img']['size'] <= 0) {
    $upload_error = true;
    $error_message .= "Opps! Seems the file size you try to upload is unacceptable.\n";
}

$img_type = basename($_FILES['upload-img']['type']);
// limit photo type
if($img_type != "jpg" && $img_type && "png" && $img_type != "jpeg"
    && $img_type != "gif" ) {
    $upload_error = true;
    $error_message .= "Opps! Seems the file type you try to upload is not acceptable.\n";
}

// if something error happened then into error print process
if ($upload_error) {
    header("Location: ../upload.php?uploaderror=" . $error_message);

} else { // when no error upload the picture
    if (move_uploaded_file($_FILES['upload-img']['tmp_name'], $upload_photo)) {
        // get the input email information from form with data sanitized
        $upload_error = false;

        $p_name = cleanData($_POST['product-name']);
        $p_des = cleanData($_POST['product-des']);
        $p_price = cleanData($_POST['product-price']);
        $file_dir = cleanData("photos/" . $_FILES['upload-img']['name']);
        $user_id = $_SESSION['userid'];

        // automatically permission grant learned from php.net
        // Author: php.net contributors
        // URL: https://www.php.net/manual/en/function.chmod.php
        // Date: (8 Dec 2021)
        chmod ( "../" . $file_dir, 644);

        // Set up the query
        $submitSQL = "INSERT INTO products (`product_name`, `product_price`, `product_description`, 
                       `picture_path`, `user_id`) VALUES ('{$p_name}','{$p_price}','{$p_des}','{$file_dir}','{$user_id}')";

        // Execute query
        $conn->query($submitSQL);

        header("Location: ../upload.php");

    } else {
        $upload_error = true;
        $error_message .= "Unknown error";
    }
}

if ($upload_error) {
    header("Location: ../upload.php?uploaderror=" . $error_message);
}


?>