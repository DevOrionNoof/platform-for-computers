<?php

/*
 * This file is created by Guanchen Zhu for the work on group Assignment.
 */

    require_once "includes/header.php";

    // when the logged user is seller or admin
    if (isset($_SESSION['username']) && ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2)) {
?>

        <!--page title-->
        <div class="container marketing">
            <br>
            <h1 class="featurette-heading">Upload</h1>
            <hr class="featurette-divider">
        </div>

        <!--display part-->
        <div class="container marketing">
            <?php
                if (isset($_GET['uploaderror'])) {
                    $error_message = $_GET['uploaderror'];
                    echo "<p id='error-message'>*** {$error_message} ***</p>";
                }
            ?>

            <!--
            This picture upload php form is learned from w3schools.com and php.net
            URL: https://www.w3schools.com/PHP/php_file_upload.asp
            URL: https://www.php.net/manual/en/features.file-upload.post-method.php
            Authors: w3schools.com contributors / php.net contributors
            Date: (4 Dec 2021)
            -->

            <!--product upload form-->
            <form class="px-4 py-3" enctype="multipart/form-data" action="includes/upload_pic.php" method="post">

                <!--image upload selector-->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select image to upload: (max size 500kb)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                    <input class="form-control" type="file" name="upload-img" id="upload-img">
                </div>

                <!--product name upload form-->
                <div class="mb-3">
                    <label class="form-label" id="input-product-name">Product name: </label>
                    <input class="form-control" type="text" name="product-name" id="product-name" required pattern="\S(.*\S)?">
                </div>

                <!--product price upload form-->
                <div class="mb-3">
                    <label class="form-label" id="input-product-price">Product price:</label>
                    <input class="form-control" type="number" name="product-price" id="product-price" required pattern="\[0-9]+\">
                </div>

                <!--product description form-->
                <div class="mb-3">
                    <label class="form-label" id="input-product-description">Product description: </label>
                    <textarea class="form-control" type="text" name="product-des" id="product-des" required></textarea>
                </div>

                <div class="dropdown-divider"></div>

                <input class="btn btn-primary" type="submit" value="Upload Product" name="submit">
            </form>

            <hr class="featurette-divider">


            <h3 class="display-6">Uploaded products:</h3>
            <hr class="featurette-divider">


<?php
        require_once "includes/upload_display.php";
        echo "</div>";
    }
    else {
        header("Location: index.php");
    }

    require_once "includes/footer.php";
?>

<!-- JavaScript for handling async event/request -->
<script src="js/ajax2.js"></script>
