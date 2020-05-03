<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$pendidikan = isset($_POST["pendidikan"]) ? $connect->real_escape_string($_POST["pendidikan"]) : false;
$jurusan = isset($_POST["jurusan"]) ? $connect->real_escape_string($_POST["jurusan"]) : false;
$tahun = isset($_POST["tahun"]) ? $connect->real_escape_string($_POST["tahun"]) : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;
$alamat = isset($_POST["alamat"]) ? $connect->real_escape_string($_POST["alamat"]) : false;

if(!$pendidikan || !$jurusan || !$tahun || !$keterangan || !$alamat){
    header("location: ?my=edu&then=add&info=fail");
    die();
}

mysqli_query($connect, "INSERT INTO education(tingkat, jurusan, keterangan, tahun, alamat) 
                        VALUES('$pendidikan', '$jurusan', '$keterangan', '$tahun', '$alamat')") or die(mysqli_error($connect));

header("location: ?my=edu&status=added");
?>