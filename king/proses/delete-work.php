<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;

mysqli_query($connect, "DELETE FROM experience WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=work&status=deleted");
?>