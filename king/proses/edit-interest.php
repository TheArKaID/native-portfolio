<?php

if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
$nama = isset($_POST["nama"]) ? $connect->real_escape_string($_POST["nama"]) : false;
$keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;

if(!$nama || !$keterangan){
    header("location: ?my=interest&then=edit&info=fail");
    die();
}
    
mysqli_query($connect, "UPDATE interest SET 
nama = '$nama', 
keterangan = '$keterangan'
WHERE id = $id") or die(mysqli_error($connect));

header("location: ?my=interest&status=edited");
?>