<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
$pendidikan = isset($_POST["pendidikan"]) ? $connect->real_escape_string($_POST["pendidikan"]) : false;
$jurusan = isset($_POST["jurusan"]) ? $connect->real_escape_string($_POST["jurusan"]) : false;
$tahun = isset($_POST["tahun"]) ? $connect->real_escape_string($_POST["tahun"]) : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;
$alamat = isset($_POST["alamat"]) ? $connect->real_escape_string($_POST["alamat"]) : false;

if(!$pendidikan || !$jurusan || !$tahun || !$keterangan || !$alamat){
    header("location: ?my=edu&then=edit&info=fail");
    die();
}
    
mysqli_query($connect, "UPDATE education SET 
tingkat = '$pendidikan', 
jurusan = '$jurusan' ,
tahun = '$tahun',
keterangan = '$keterangan', 
alamat = '$alamat'
WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=edu&status=edited");
?>