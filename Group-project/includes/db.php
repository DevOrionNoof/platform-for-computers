<?php
    /*
     * This file is created by Guanchen Zhu for the work on group Assignment.
     */

    $host = "db.cs.dal.ca";
    $username = "shehhi";
    $password = "jy4m2jvMHE5y5g6VqAiUS5qro";
    $dbname = "shehhi";

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Nooooooooo!" . $conn->connect_error);
    }

?>