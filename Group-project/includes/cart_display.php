<div class="container marketing" id="list-container">

    <?php
    /*
    * This file is created by Guanchen Zhu for the work on group Assignment.
    */
    // initialize two variables for further counting
    $count = 0;
    $total_price = 0;

    // create view of cart database
    $cartSQL = "SELECT * FROM cart";
    $carResult = $conn->query($cartSQL);

    // display them row by row
    while ($cartRow = $carResult->fetch_assoc()) {
        if ($_SESSION['userid'] == $cartRow['user_id']) {

            $product_id = $cartRow['product_id'];

            $querySQL = "SELECT * FROM products";
            $result = $conn->query($querySQL);

            while ($row = $result->fetch_assoc()) {
                // we compare product id of cart and product id of product table, when they are same execute
                if ($product_id == $row['product_id']) {
                    // cart number increase
                    $count++;

                    $product_name = $row['product_name'];
                    $product_des = $row['product_description'];
                    $product_img = $row['picture_path'];
                    $product_price = $row['product_price'];

                    // count the total price
                    $total_price += $product_price;
                    ?>

                    <div class="row featurette">
                        <div class="col-md-7">
                            <h2 class="featurette-heading"> <span class="text-muted"><?php echo $product_name?></span></h2>
                            <p class="lead"><?php echo $product_des?></p>
                            <p><a class="btn btn-secondary" href="display.php?id=<?php echo $row['product_id']?>" role="button">View details &raquo;</a></p>
                            <h3>$<?php echo $product_price?></h3>
                            <button class="btn btn-secondary" name="delete-submit" type="submit" onclick="sendDeleteToServer1(<?php echo $product_id?>)">Delete</button>
                        </div>
                        <div class="col-md-5">
                            <img class="featurette-image img-fluid mx-auto" src="<?php echo $product_img?>" alt="Generic placeholder image">
                        </div>
                    </div>

                    <hr class="featurette-divider">

                    <?php
                }
            }
        }
    }

    if ($count == 0) {
    ?>

    <!--when there is no products in cart-->
    <div class="row featurette">
        <div class="col-md-7">
            <h3 class="featurette-heading"> <span class="text-muted">Opps, there is no product in this cart. Please enjoy shopping.</span></h3>
    </div>

    <hr class="featurette-divider">

    <?php
    } else {
    ?>
        <div class="row featurette">
            <div class="col-md-7">
                <h3 class="featurette-heading"> <span class="text-muted">The total price is: $<?php echo $total_price ?></span></h3>
            </div>
        </div>

        <hr class="featurette-divider">

    <?php
    }
    ?>

</div>
