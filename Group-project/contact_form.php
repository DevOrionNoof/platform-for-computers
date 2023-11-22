<?php
/*
 * This file is edited by Guanchen Zhu for the work on Group Assignment.
 */
require_once "includes/header.php";

if (isset($_SESSION['username'])) {

    if (isset($_POST['send-contact'])) {

        // get the input email information from form with data sanitized
        $sender_id = $_SESSION['userid'];
        $contact_subject = cleanData($_POST['contact-subject']);
        $contact_contents = cleanData($_POST['contact-contents']);
        $contact_data = date("20y-m-d H:i:s");

        // Set up the query
        $submitSQL = "INSERT INTO `contact`(`user_id`, `c_subject`, `c_content`, `c_date`) 
            VALUES ('{$sender_id}','{$contact_subject}','{$contact_contents}','{$contact_data}')";

        // Execute query
        $conn->query($submitSQL);

    }
?>
        <div class="container marketing">
            <br>
            <h1 class="featurette-heading">Compose a new contact:</h1>
            <hr class="featurette-divider">
        </div>

        <div class="container marketing">
            <form class="px-4 py-3" id="email_form" method="post" action="">
                <div class="mb-3">
                    <label class="form-label" id="input-head-subject">Contact subject: </label>
                    <input class="form-control" type="text" name="contact-subject" id="contact-subject" required pattern="\S(.*\S)?">
                </div>

                <div class="mb-3">
                    <label class="form-label" id="input-email-content">Contact text content: </label>
                    <textarea class="form-control" type="text" name="contact-contents" id="contact-contents" required></textarea>
                </div>

                <div class="dropdown-divider"></div>

                <input class="btn btn-primary" type="submit" name="send-contact" id="send-contact" value="Send contact">
                <input class="btn btn-primary" type="reset" name="clear-contents" id="clear-contents" value="Clear contents">
            </form>

            <hr class="featurette-divider">
        </div>

<?php
} else {
    header("Location: includes/index.php");
}
require_once "includes/footer.php";
?>
