<?php
    @ $db = new mysqli("localhost", "root", "", "lawrence");
    if (mysqli_connect_errno()) {
        echo 'Error. Cannot connect to database.';
        exit;
    }
?>