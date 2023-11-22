<?php
    /*
     * This file is created by Guanchen Zhu for the work on group Assignment.
     */

    if (isset($_POST['Login'])) {
        // Regenerate session ID
        session_regenerate_id();

        // get the username and password from form with data sanitized
        $username = cleanData($_POST['username']);
        $password = cleanData($_POST['password']);

        // Set up the query
        $querySQL = "SELECT * FROM users";

        // Execute query
        $result = $conn->query($querySQL);

        // Set a determinant for query string
        $loginerror = true;

        // Update this code to display the list if list items are available in the DB
        while ($row = $result->fetch_assoc()) {
            // if the username fit on
            if (strcmp($row['user_name'], $username) == 0) {
                // if the password for corresponds username fit on
                if (password_verify($password, $row['user_password'])) {

                    // create session contents
                    $_SESSION['username'] = $username;
                    $_SESSION['usertype'] = $row['user_type'];
                    $_SESSION['userid'] = $row['user_id'];

                    // set the determinant to false, since no input error
                    $loginerror  = false;
                }
            }
        }

        // if the input has error, use query string to show error message in desired position
        if ($loginerror) {
            header("Location: index.php?loginerror=true");
        } else{
            // if the input has no error redirect to home page
            header("Location: index.php");
        }
    }
?>
<main id="pg-login">

    <!--header of this page-->
    <div class="container marketing">
        <br>
        <h1 class="featurette-heading">Login to Online shopping system</h1>
        <hr class="featurette-divider">
    </div>

    <!--login form display section-->
    <div class="container marketing">

        <?php
        // error message with query string determinant
        if (isset($_GET['loginerror']) && $_GET['loginerror'] == "true") {
            echo "<p id='error-message'>*** The username or/and password you have entered is not correct, please try again! ***</p>";
        }
        ?>

        <!--form of login system-->
        <form class="px-4 py-3" id="login-form" method="post" action="">
            <div class="mb-3">
                <label for="input-head-username" class="form-label">Your username:</label>
                <input class="form-control" type="text" name="username" id="input-username" required pattern="\S(.*\S)?">
            </div>

            <div class="mb-3">
                <label id="input-head-password">Your password: </label>
                <input class="form-control" type="password" name="password" id="input-password" required pattern="\S(.*\S)?">
            </div>

            <div class="dropdown-divider"></div>

            <input class="btn btn-primary" type="submit" name="Login" id="input-submit-form" value="Login">
            <input class="btn btn-primary" type="reset" name="Clear" id="input-clear" value="Clear">

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="signup.php" role="button">New User? Sign up here!</a>
        </form>

        <hr class="featurette-divider">

    </div>

</main>