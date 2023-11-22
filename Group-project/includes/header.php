<!--
	The starter code for this website was downloaded from getbootstrap.com, by Guanchen Zhu.
	This layout (named Carousel) was contributed by Mark Otto, Jacob Thornton, and Bootstrap contributors, who are developers to Bootstrap via example themes.
	URL: https://getbootstrap.com/docs/5.1/examples/carousel/
	Date: (28 Nov 2021)
 -->

<?php
    /*
    * This file is created by Guanchen Zhu for the work on group Assignment.
    */
    session_start(); // start the session
    require_once "includes/db.php";
    require_once "includes/functions.php"
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online shopping website</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">
</head>


<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <?php
                        if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
                            echo "<a class='nav-link' href = 'includes/logout.php' > Logged in as {$_SESSION['username']} (logout) </a >";

                            // customers and administrators can access this part
                            if ($_SESSION['usertype'] == 0 || $_SESSION['usertype'] == 2) {
                    ?>

                            <li class="nav-item">
                                <a class="nav-link" href="cart.php">Cart</a>
                            </li>

                        <?php
                            }
                            // sellers and administrators can access this part
                            if ($_SESSION['usertype'] == 1 || $_SESSION['usertype'] == 2) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="upload.php">Upload</a>
                            </li>

                        <?php
                            }
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="contact_form.php">Contact Us</a>
                            </li>

                        <?php
                            // only administrators can access this part
                            if ($_SESSION['usertype'] == 2) {
                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact_display.php">Contact inbox</a>
                                </li>

                        <?php
                            }
                        ?>

                </ul>
                <!--the search form-->
<!--                <form class="form-inline mt-2 mt-md-0" method="post" action="">-->
<!--                    <input class="form-control mr-sm-2 id="search-content" name="search-content" type="search" placeholder="Search" aria-label="Search" required pattern="\S(.*\S)?">-->
<!--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--                </form>-->
                <form class="d-flex" method="post" action="">
                    <input class="form-control me-2" id="search-content" name="search-content" type="search" placeholder="Search" aria-label="Search" required pattern="\S(.*\S)?">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php
                    }
                ?>
        </div>
    </nav>
</header>
