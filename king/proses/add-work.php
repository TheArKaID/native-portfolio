<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$job = isset($_POST["job"]) ? $connect->real_escape_string($_POST["job"]) : false;
$perusahaan = isset($_POST["perusahaan"]) ? $connect->real_escape_string($_POST["perusahaan"]) : false;
$daerah = isset($_POST["daerah"]) ? $connect->real_escape_string($_POST["daerah"]) : false;
$tahun = isset($_POST["tahun"]) ? $_POST["tahun"] : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;

if(!$job || !$perusahaan || !$daerah || !$tahun){
    header("location: ?my=work&then=add&info=fail");
    die();
}
var_dump(is_int($tahun)); die();
if(!(is_int($tahun))){
    header("location: ?my=work&then=add&info=tahun");
    die();
}

mysqli_query($connect, "INSERT INTO experience(posisi, perusahaan, alamat, tahun, keterangan) 
    VALUES('$job', '$perusahaan', '$daerah', '$tahun', '$keterangan')") or die(mysqli_error($connect));

header("location: ?my=work&status=added");
?>