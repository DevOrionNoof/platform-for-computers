<?php
/*
 * This file is created by Guanchen Zhu for the work on group Assignment.
 */
    require_once "includes/header.php";

    // only for logged-in user
    if (isset($_SESSION['username']) && isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $querySQL = "SELECT * FROM products WHERE product_id = " . $product_id;
        $result = $conn->query($querySQL);
        $row = $result->fetch_assoc();

        $product_name = $row['product_name'];
        $product_des = $row['product_description'];
        $product_img = $row['picture_path'];
        $seller_id = $row['user_id'];
        $product_price = $row['product_price'];

?>
<div class="container marketing">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading"> <span class="text-muted"><?php echo $product_name?></span></h2>
                <p class="lead"><?php echo $product_des?></p>
                <form action="includes/display_process.php" method="post">
                    <button class="btn btn-secondary" name="add-cart" type="submit" value = <?php echo $product_id?>>Add to Cart</button>
                </form>
                <hr class="featurette-divider">
                <h3 class="featurette-heading">$<?php echo $product_price?></h3>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="<?php echo $product_img?>" alt="Generic placeholder image">
            </div>
        </div>
    <hr class="featurette-divider">

</div>

<?php
    }
    else {
        header("Location: index.php");
    }
    require_once "includes/footer.php";
?>
