<?php
    $env = parse_ini_file('.env');
    $con = mysqli_connect($env["DBHOST"], $env["DBUSER"], $env["DBPASS"], $env["DBNAME"]);
?>