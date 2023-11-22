<?php
/*
 * This file is created by Guanchen Zhu for the work on group Assignment.
 */
require_once "includes/header.php";
require_once "includes/functions.php";

if (isset($_POST['signup'])) {

    // get the username and password from form with data sanitized
    $username = cleanData($_POST['username']);
    $password = cleanData($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $usertype = $_POST['account-type'];

    // Set up the query
    $querySQL = "SELECT * FROM users";

    // Execute query
    $result = $conn->query($querySQL);

    // Set a determinant for query string
    $signuperror = false;

    // Update this code to display the list if list items are available in the DB
    while ($row = $result->fetch_assoc()) {
        // if the username fit on
        if (strcmp($row['user_name'], $username) == 0) {
            $signuperror  = true;
        }
    }

    // if the input has error, use query string to show error message in desired position
    if ($signuperror) {
        header("Location: signup.php?signuperror=true");
    } else {
        $submitSQL = "INSERT INTO users (`user_name`, `user_password`, `user_type`) 
            VALUES ('{$username}','{$hashed_password}','{$usertype}')";

        $submit= $conn->query($submitSQL);

        header("Location: index.php");
    }


}
?>
<main id="pg-login">

    <div class="container marketing">
        <br>
        <h1 class="featurette-heading">Signup to Online shopping system</h1>
        <hr class="featurette-divider">
    </div>

    <div class="container marketing">
        <?php
        // error message with query string determinant
        if (isset($_GET['signuperror']) && $_GET['signuperror'] == "true") {
            echo "<p id='error-message'>*** The username you have entered is taken, please try again! ***</p>";
        }
        ?>

        <!--form of login system-->

        <form class="px-4 py-3" id="signup-form" method="post" action="">
            <div class="mb-3">
                <label id="input-head-username" class="form-label">Your username:</label>
                <input class="form-control" type="text" name="username" id="input-username" required pattern="\S(.*\S)?">
            </div>

            <div class="mb-3">
                <label id="input-head-password" class="form-label">Your password:</label>
                <input class="form-control" type="password" name="password" id="input-password" required pattern="\S(.*\S)?">
            </div>

            <div class="mb-3">
                <label id="input-account-type" class="form-label">Account type:</label>
                <select class="form-select" id="account-type" name="account-type" autofocus>
                    <option value=0>Costumer</option>
                    <option value=1>Seller</option>
                </select>
            </div>

            <div class="dropdown-divider"></div>
            <input class="btn btn-primary" type="submit" name="signup" id="input-submit-form" value="signup">
            <input class="btn btn-primary" type="reset" name="Clear" id="input-clear" value="Clear">
        </form>

        <hr class="featurette-divider">

    </div>

</main>

<?php
    require_once "includes/footer.php";
?>