<div class="container marketing" id="list-container">

    <?php
    /*
    * This file is created by Guanchen Zhu for the work on group Assignment.
    */

    // index for count how many product in
    $count = 0;

    $querySQL = "SELECT * FROM products";
    $result = $conn->query($querySQL);

    while ($row = $result->fetch_assoc()) {
        if ($_SESSION['userid'] == $row['user_id']) {

            $count++;

            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_des = $row['product_description'];
            $product_img = $row['picture_path'];
            $product_price = $row['product_price'];

            ?>

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading"> <span class="text-muted"><?php echo $product_name?></span></h2>
                    <p class="lead"><?php echo $product_des?></p>
                    <p><a class="btn btn-secondary" href="display.php?id=<?php echo $row['product_id']?>" role="button">View details &raquo;</a></p>
                    <h3>$<?php echo $product_price?></h3>
                    <button class="btn btn-secondary" name="delete-submit" type="submit" onclick="sendDeleteToServer2(<?php echo $product_id?>)">Delete</button>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="<?php echo $product_img?>" alt="Generic placeholder image">
                </div>
            </div>

            <hr class="featurette-divider">

            <?php
        }
    }
    // when there is no product uploaded
    if ($count == 0) {
    ?>

    <div class="row featurette">
        <div class="col-md-7">
            <h3 class="featurette-heading"> <span class="text-muted">Opps, it seems you haven't upload any product yet. Start your business easily.</span></h3>
        </div>

        <hr class="featurette-divider">

        <?php
        }
        ?>

    </div>
</div>