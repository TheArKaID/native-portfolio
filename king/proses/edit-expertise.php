<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
$tipe = isset($_POST["tipe"]) ? $connect->real_escape_string($_POST["tipe"]) : false;
$deskripsi = isset($_POST["deskripsi"]) ? $connect->real_escape_string($_POST["deskripsi"]) : false;

if(!$tipe || !$deskripsi){
    header("location: ?my=expertise&then=edit&info=fail");
    die();
}
    
mysqli_query($connect, "UPDATE expertise SET nama = '$tipe', keterangan = '$deskripsi' WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=expertise&status=edited");
?>