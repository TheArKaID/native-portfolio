<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
$job = isset($_POST["job"]) ? $connect->real_escape_string($_POST["job"]) : false;
$perusahaan = isset($_POST["perusahaan"]) ? $connect->real_escape_string($_POST["perusahaan"]) : false;
$daerah = isset($_POST["daerah"]) ? $connect->real_escape_string($_POST["daerah"]) : false;
$tahun = isset($_POST["tahun"]) ? $_POST["tahun"] : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;

if(!$job || !$perusahaan || !$daerah || !$tahun){
    header("location: ?my=work");
    die();
}

// if(!is_int($tahun)){
//     header("location: ?my=work&s");
//     die();
// }
    
mysqli_query($connect, "UPDATE experience 
    SET posisi = '$job', 
        perusahaan = '$perusahaan', 
        alamat = '$daerah',
        tahun = $tahun,
        keterangan = '$keterangan' WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=work&status=edited");
?>