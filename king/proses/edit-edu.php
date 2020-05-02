<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
$pendidikan = isset($_POST["pendidikan"]) ? $connect->real_escape_string($_POST["pendidikan"]) : false;
$jurusan = isset($_POST["jurusan"]) ? $connect->real_escape_string($_POST["jurusan"]) : false;
$tahun = isset($_POST["tahun"]) ? $connect->real_escape_string($_POST["tahun"]) : false;

if(!$pendidikan || !$jurusan || !$tahun){
    header("location: ?my=edu&then=edit&info=fail");
    die();
}
    
mysqli_query($connect, "UPDATE education SET 
nama = '$pendidikan', 
jurusan = '$jurusan' ,
tahun = '$tahun'
WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=edu&status=edited");
?>