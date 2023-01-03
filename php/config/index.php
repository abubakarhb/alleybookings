<?php
    $hostname_alleybookings = "localhost";
    $database_alleybookings = "alleybookings";
    $username_alleybookings = "root";
    $password_alleybookings = "";
    $alleybookingsConnection = mysqli_connect($hostname_alleybookings, $username_alleybookings, $password_alleybookings, $database_alleybookings) or trigger_error(mysqli_error($alleybookingsConnection),E_USER_ERROR);
