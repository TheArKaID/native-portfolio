<?php
// TODO: UPDATE PROFILE PICTURE
if($_SERVER["REQUEST_METHOD"]=="GET"){
    header("location: ?my=home");
    die();
}

$nama = isset($_POST["nama"]) ? $connect->real_escape_string($_POST["nama"]) : false;
$statusSkill = isset($_POST["statusSkill"]) ? $connect->real_escape_string($_POST["statusSkill"]) : false;
$tentangSaya = isset($_POST["tentangSaya"]) ? $connect->real_escape_string($_POST["tentangSaya"]) : false;
$motto = isset($_POST["motto"]) ? $connect->real_escape_string($_POST["motto"]) : false;
$alamat = isset($_POST["alamat"]) ? $connect->real_escape_string($_POST["alamat"]) : false;
$noHP = isset($_POST["noHP"]) ? $connect->real_escape_string($_POST["noHP"]) : false;
$email = isset($_POST["email"]) ? $connect->real_escape_string($_POST["email"]) : false;

if(!$nama || !$statusSkill || !$tentangSaya || !$motto || !$alamat || !$noHP || !$email){
    header("location: ?my=profile&info=fail");
    die();
}
    
mysqli_query($connect, "UPDATE profile SET 
nama = '$nama', 
title = '$statusSkill',
tentang = '$tentangSaya',
motto = '$motto',
alamat = '$alamat',
nohp = '$noHP',
email = '$email'") or die(mysqli_error($connect));

header("location: ?my=profile&status=edited");
?>