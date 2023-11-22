<?php
    /*
     * This file is created by Guanchen Zhu for the work on group Assignment.
     */
    require_once "includes/db.php";
    require_once "includes/header.php";
?>
        <!--page title-->
        <div class="container marketing">
            <br>
            <h1 class="featurette-heading">Inbox</h1>
            <hr class="featurette-divider">
        </div>

<div class="container marketing">
<?php
$querySQL = "SELECT * FROM contact";
$result = $conn->query($querySQL);

// for contact viewing
if (isset($_GET['contactid'])) {
    $id = $_GET['contactid'];
    while ($row = $result->fetch_assoc()) {
        if ($row['c_id'] == $id) {
            echo "<div><b><i>Subject:</i></b> {$row['c_subject']} </div>";
            echo "<br>";
            echo "<br>";
            echo "<div><b><i>Contact content:</i></b></div>";
            echo "<br>";
            echo "<div>{$row['c_content']}</div>";
            echo "<hr class='featurette-divider'>";
        }
    }
    echo "</div>";
}
else {
    ?>
    <?php 
            $result = $conn->query($querySQL);
            $index = 1;
            if(!empty($result) && $result->num_rows > 0) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">CONTACT SUBJECT</th>
                <th scope="col">RECEIVED DATE</th>
            </tr>
        </thead>

        <tbody>
            <?php

                // Update this code to display the list if list items are available in the DB
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td scope='row'>" . $index . "</td>";
                    echo "<td id='email-link'> <a href='contact_display.php?contactid={$row["c_id"]}'> {$row['c_subject']} </a> </td>";
                    echo "<td id='send-date'>" . $row['c_date'] . "</td>";
                    echo "</tr>";
                    $index++;
                }
            ?>
        </tbody>
    </table>
    <?php } else { ?>
    <h2>No messages yet!</h2>
    <?php } ?>
    <hr class='featurette-divider'>

    <?php
    echo "</div>";
}
require_once "includes/footer.php";
?>