<?php

    $dbserver = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "arkaport";
    
    $connect = new mysqli($dbserver, $dbuser, $dbpass, $db);
    $pdo = new PDO('mysql:host='.$dbserver.';dbname='.$db, $dbuser, $dbpass);
?>