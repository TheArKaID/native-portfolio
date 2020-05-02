<?php

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        header("location: ?my=home");
        die();
    }

    $id = isset($_POST["id"]) ? $connect->real_escape_string($_POST["id"]) : false;
    $checkImages = mysqli_query($connect, "SELECT foto FROM portfolio WHERE id = '$id'");
    $images = mysqli_fetch_assoc($checkImages);
    $images = $images['foto'];
    $images = explode("|", $images);

    mysqli_autocommit($connect, false);
    mysqli_query($connect, "DELETE FROM portfolio WHERE id = $id") or die(mysqli_error($connect));
    
    if(mysqli_commit($connect)){
        foreach ($images as $image) {
            unlink("../img/portofolio/".$image);
        }
        header("location: ?my=portofolio&status=deleted");
    } else{
        header("location: ?my=portofolio&info=fail");
    }
?>