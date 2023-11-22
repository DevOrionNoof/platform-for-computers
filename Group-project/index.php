<!--
	The starter code for this website was downloaded from getbootstrap.com, by Raghav Sampangi.
	This layout (named Carousel) was contributed by Mark Otto, Jacob Thornton, and Bootstrap contributors, who are developers to Bootstrap via example themes.
	URL: https://getbootstrap.com/docs/5.1/examples/carousel/
	Date: (28 Nov 2021)
 -->

<?php
    /*
     * This file is edited by Guanchen Zhu for the work on group Assignment.
     */
    require_once "includes/header.php";
?>

<main>
    <?php
        // check if user logged in
        if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
    ?>

    <!--this section is for carousel slid displaying-->
    <div class="container-fluid">

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"> </button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
    <!--                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <img src="photos/workplace.jpg">
                    <div class="container-fluid">
                        <div class="carousel-caption text-start">
                            <h1>Office computers.</h1>
                            <p>The best office computers with reasonable price.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
    <!--                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <img src="photos/keyboard-gffcb5ff04_1920.jpg">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Computer components.</h1>
                            <p>With great amount of computer components for game players.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
    <!--                <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>-->
                    <img src="photos/flat.jpg">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>Personal computers.</h1>
                            <p>The most advantaged computers with the best CPU and motherboard you can brought from the market.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Marketing messaging and featurettes
================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <!-- Three columns of text below the carousel -->
        <div class="row">
            <div class="col-lg-4">
                <img class="rounded-circle" src="photos/andras-vas-Bd7gNnWJBkU-unsplash.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>RBG</h2>
                <p>The best RBG can give you extreme gaming experience.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="photos/christopher-gower-m_HRfLhgABo-unsplash.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Professional</h2>
                <p>Help you to improve on your career!</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <img class="rounded-circle" src="photos/designecologist-Pmh0UoG1vlE-unsplash.jpg" alt="Generic placeholder image" width="140" height="140">
                <h2>Entertainment</h2>
                <p>Better get a laptop now, improving the the video experience.</p>
            </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <?php
        // search form function
        // if no input show all the products
        if (!isset($_POST['search-content'])) {
            $querySQL = "SELECT * FROM products";
        }else { // else show the search result
            $keyword = $_POST['search-content'];
            $querySQL = "SELECT * FROM products WHERE product_name LIKE '%" . $keyword . "%'";
        }
            $result = $conn->query($querySQL);

            // get the database data, then display them
            while ($row = $result->fetch_assoc()) {

                $product_name = $row['product_name'];
                $product_des = $row['product_description'];
                $product_img = $row['picture_path'];
                $seller_id = $row['user_id'];
                $product_price = $row['product_price'];
        ?>

        <!--products display-->
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading"> <span class="text-muted"><?php echo $product_name?></span></h2>
                <p class="lead"><?php echo $product_des?></p>
                <p><a class="btn btn-secondary" href="display.php?id=<?php echo $row['product_id']?>" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="<?php echo $product_img?>" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <?php
            }
        ?>

        <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->

</main>

<?php
    }
    else { // when not logged in get the login page
        require_once "includes/login.php";
    }
    require_once "includes/footer.php";
?>