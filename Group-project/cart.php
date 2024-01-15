<?php
    require_once "includes/header.php";
    // permission only allowed for costumers or admin
    if (isset($_SESSION['username']) && ($_SESSION['usertype'] == 0 || $_SESSION['usertype'] == 2)) {
?>
        <!--page title-->
        <div class="container marketing">
            <br>
            <h1 class="featurette-heading">Cart</h1>
            <hr class="featurette-divider">
        </div>

<?php
        require_once "includes/cart_display.php";
        echo "</div>";
    }
    else {
        header("Location: index.php");
    }
    require_once "includes/footer.php";
?>

<!-- JavaScript for handling async event/request -->
<script src="js/ajax.js"></script>