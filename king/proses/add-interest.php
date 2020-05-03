<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$nama = isset($_POST["nama"]) ? $connect->real_escape_string($_POST["nama"]) : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;

if(!$nama || !$keterangan){
    header("location: ?my=interest&then=add&info=fail");
    die();
}

mysqli_query($connect, "INSERT INTO interest(nama, keterangan) VALUES('$nama', '$keterangan')") or die(mysqli_error($connect));

header("location: ?my=interest&status=added");
?>