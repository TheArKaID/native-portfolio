<?php

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        header("location: ?my=home");
        die();
    }

    $judul = isset($_POST['judul']) ? $_POST['judul'] : false;
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : false;
    $url = isset($_POST['url']) ? $_POST['url'] : false;
    $platform = isset($_POST['platform']) ? $_POST['platform'] : false;
    $thumbnail = isset($_FILES['thumbnail']) ? $_FILES['thumbnail'] : false;
    $preview1 = isset($_FILES['preview1']) ? $_FILES['preview1'] : false;
    $preview2 = isset($_FILES['preview2']) ? $_FILES['preview2'] : false;
    $preview3 = isset($_FILES['preview3']) ? $_FILES['preview3'] : false;
    
    if((!$judul) || (!$keterangan) || (!$url) || (!$platform) || (!$thumbnail) || (!$preview1) || (!$preview2) || (!$preview3)){
        header("location: ?my=portofolio&then=add&info=null");
        die();
    }

    $text = trim($judul);
    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
    $text = strtolower(trim($text));
    $text = str_replace(' ', '-', $text);
    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

    $thumbnailext = pathinfo($thumbnail['name'], PATHINFO_EXTENSION);
    $preview1ext = pathinfo($preview1['name'], PATHINFO_EXTENSION);
    $preview2ext = pathinfo($preview2['name'], PATHINFO_EXTENSION);
    $preview3ext = pathinfo($preview3['name'], PATHINFO_EXTENSION);
    
    // die();

    if(($thumbnailext=="jpg") || ($thumbnailext=="JPG") || ($thumbnailext=="png") || ($thumbnailext=="PNG")){
    } else{
        header("location: ?my=portofolio&then=add&info=ext0");
        die();
    }

    if(($preview1ext=="jpg") || ($preview1ext=="JPG") || ($preview1ext=="png") || ($preview1ext=="PNG")){
    } else{
        header("location: ?my=portofolio&then=add&info=ext1");
        die();
    }
    
    if(($preview2ext=="jpg") || ($preview2ext=="JPG") || ($preview2ext=="png") || ($preview2ext=="PNG")){
    } else{
        header("location: ?my=portofolio&then=add&info=ext2");
        die();
    }
    
    if(($preview3ext=="jpg") || ($preview3ext=="JPG") || ($preview3ext=="png") || ($preview3ext=="PNG")){
    } else{
        header("location: ?my=portofolio&then=add&info=ext3");
        die();
    }

    $thumbnailname = $text. "-0.".$thumbnailext;
    $prevname1 = $text. "-1.".$preview1ext;
    $prevname2 = $text. "-2.".$preview2ext;
    $prevname3 = $text. "-3.".$preview3ext;
    
    $path = "../img/portofolio/";
    
    if (!move_uploaded_file($thumbnail['tmp_name'], $path.$thumbnailname)) {
        header("location: ?my=portofolio&then=add&info=foto");
        die();
    }
    if (!move_uploaded_file($preview1['tmp_name'], $path.$prevname1)) {
        header("location: ?my=portofolio&then=add&info=foto");
        die();
    }
    if (!move_uploaded_file($preview2['tmp_name'], $path.$prevname2)) {
        header("location: ?my=portofolio&then=add&info=foto");
        die();
    }
    if (!move_uploaded_file($preview3['tmp_name'], $path.$prevname3)) {
        header("location: ?my=portofolio&then=add&info=foto");
        die();
    }

    $images[]=[$thumbnailname, $prevname1, $prevname2, $prevname3];
    $foto = implode("|",$images[0]);
    
    mysqli_query($connect, "INSERT INTO portfolio(judul, platform, keterangan, url, foto) 
                                VALUES('$judul', '$platform', '$keterangan', '$url', '$foto')") or die(mysqli_error($connect));

    header("location: ?my=portofolio&status=added");

?>