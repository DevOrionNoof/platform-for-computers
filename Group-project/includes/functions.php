<?php

    function cleanData ($string) {
        return htmlspecialchars(stripslashes(trim($string)));
    }
?>