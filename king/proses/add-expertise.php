<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$tipe = isset($_POST["tipe"]) ? $connect->real_escape_string($_POST["tipe"]) : false;
$deskripsi = isset($_POST["deskripsi"]) ? $connect->real_escape_string($_POST["deskripsi"]) : false;

if(!$tipe || !$deskripsi){
    header("location: ?my=expertise&then=add&info=fail");
    die();
}

mysqli_query($connect, "INSERT INTO expertise(nama, keterangan) VALUES('$tipe', '$deskripsi')") or die(mysqli_error($connect));

header("location: ?my=expertise&status=added");
?>