<?php

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        // header("location: ?my=home");
        die();
    }

    $id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
    $judul = isset($_POST["judul"]) ? $connect->real_escape_string($_POST["judul"]) : false;
    $github = isset($_POST["github"]) ? $connect->real_escape_string($_POST["github"]) : false;
    $web = isset($_POST["web"]) ? $connect->real_escape_string($_POST["web"]) : false;
    $keterangan = isset($_POST["keterangan"]) ? $connect->real_escape_string($_POST["keterangan"]) : false;

    if(!$keterangan || !$judul){
        header("location: ?my=portofolio&then=edit&info=fail");
        die();
    }
        
    mysqli_query($connect, "UPDATE portfolio SET
    judul = '$judul', github = '$github', web = '$web', keterangan = '$keterangan' WHERE id = $id") or die(mysqli_error($connect));

    header("location: ?my=portofolio&status=edited");
?>