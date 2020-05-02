<?php

include_once("../function/config.php");
include_once("../function/static.php");
session_start();
$opened = false;

$token = isset($_SESSION['token']) ? $_SESSION['token'] : false;
$tokenQuery = mysqli_query($connect, "SELECT token FROM config WHERE token = '$token'");
$tokenData = mysqli_num_rows($tokenQuery);

if (!$token) {
    header("location: index.php");
    die();
} else if ($tokenData != 1) {
    header("location: index.php");
    die();
}

$position = isset($_GET["my"]) ? $_GET["my"] : false;

if (!$position)
    header("location: main?my=home");

$action = isset($_GET["then"]) ? $_GET["then"] : false;
$do = isset($_GET["so"]) ? $_GET["so"] : false;

$profilequery = mysqli_query($connect, "SELECT * FROM profile");
$profiledata = mysqli_fetch_assoc($profilequery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../img/logo.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/stylein.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/sidenav.css" />
    <link rel="stylesheet" href="../css/all.css">
    <title>I'm a King of my Life</title>
</head>

<body data-senna-surface="data-senna-surface" data-senna="data-senna" style="font-family: ubuntuFont">
    <div class="col-md-12">
        <div class="row" style="background-color: #dc3545; color: white; padding: 16px; font-size: 20pt">
            <div class="col-md-2" style="text-align: left">
                <img src="../img/thearka.png" alt="The ArKKa" class="rounded" style="height: auto; width: 100%; padding-right: 16px">
            </div>
            <div class="col-md-5" style="text-align: center">
                B
            </div>
            <div class="col-md-5" style="text-align: right">
                <a href="#logout"><i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
        <div class="row" style="height: 100%">
            <div class="col-md-2 sidebar">
                <div style="text-align: center; margin: 8px">
                    <img src="../img/profile.jpg" class="rounded-circle" alt="Me" width="100" height="100">
                    <div><?php echo $profiledata['nama']; ?></div>
                </div>

                <ul>
                    <li>
                        <a href="main?my=home" <?php echo $position == "home" ? "class='active'" : ""; ?>><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a href="main?my=profile" <?php echo $position == "profile" ? "class='active'" : ""; ?>><i class="fas fa-user-circle"></i> Profile</a>
                    </li>
                    <li>
                        <a href="main?my=expertise" <?php echo $position == "expertise" ? "class='active'" : ""; ?>><i class="far fa-star"></i> Expertise</a>
                    </li>
                    <li>
                        <a href="main?my=work" <?php echo $position == "work" ? "class='active'" : ""; ?>><i class="fas fa-briefcase"></i> Work Experience</a>
                    </li>
                    <li>
                        <a href="main?my=edu" <?php echo $position == "edu" ? "class='active'" : ""; ?>><i class="fas fa-graduation-cap"></i> Education</a>
                    </li>
                    <li>
                        <a href="main?my=interest" <?php echo $position == "interest" ? "class='active'" : ""; ?>><i class="fas fa-palette"></i> Interest</a>
                    </li>
                    <li>
                        <a href="main?my=portofolio" <?php echo $position == "portofolio" ? "class='active'" : ""; ?>><i class="fas fa-award"></i> Portfolio</a>
                    </li>
                </ul>
            </div>
            <!-- Background Dark Red -->
            <div class="col-md-10 mydarkred">
                <?php
                    if($do)
                        include("proses/$action-$position.php");
                    elseif($action)
                        include("$action/$position.php");
                    else
                        include("$position.php");
                ?>

            </div>
        </div>
        <div class="row" style="background-color: #dc3545; color: white; padding: 16px; font-size: 12pt">
            <div class="col-md-12" style="text-align: center">
                © 2019 Copyright TheArKa
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/sidenav.js"></script>
    <script type="text/javascript" src="../js/senna.js"></script>
</body>

</html>