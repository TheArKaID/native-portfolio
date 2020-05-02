<?php
    include_once("function/config.php");
    include_once("function/static.php");
    session_start();
    $platform = isset($_GET["platform"]) ? $_GET["platform"] : false;
    $view = isset($_GET["view"]) ? $_GET["view"] : false;
    $opened = false;

    $profilequery = mysqli_query($connect, "SELECT * FROM profile");
    $profiledata = mysqli_fetch_array($profilequery);
    $expertisequery = mysqli_query($connect, "SELECT * FROM expertise");
    $experiencequery = mysqli_query($connect, "SELECT * FROM experience");
    $educationquery = mysqli_query($connect, "SELECT * FROM education");
    $interestquery = mysqli_query($connect, "SELECT * FROM interest");
    $portfolioquery = mysqli_query($connect, "SELECT * FROM portfolio");

    
    date_default_timezone_set('Asia/Jakarta');
    if(isset($_SESSION['datevisit'])){
        if($_SESSION['datevisit']!=date('Y-m-d')){
            mysqli_query($connect, "UPDATE");
        }
    } else{
        $_SESSION['datevisit'] = date('Y-m-d');
        mysqli_query($connect, "UPDATE statistic SET visitors = visitors+1");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ArKa | App Developer</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styleout.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/all.css">
    <style>
        .bg-sosmed {
            background-color: white;
        }
        .bg-sosmed a{
            font-size: 20pt;
        }
    </style>
</head>

<body data-senna-surface="data-senna-surface" data-senna="data-senna">
    <div class="container-fluid">
        <div class="row" style="background: #810006">
            <div class="col-md-12">
                <h1 class="title"><?php echo $profiledata['nama']; ?> | Portfolio</h1>
                <nav class="navbar navbar-expand-sm bg-danger navbar-dark col-md-12">
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if (!$platform) echo 'active'; ?>">
                            <a class="nav-link" href="index">Home</a>
                        </li>
                        <li class="nav-item <?php if ($platform == "desktop") echo 'active'; ?>">
                            <a class="nav-link" href="index?platform=desktop">Desktop</a>
                        </li>
                        <li class="nav-item <?php if ($platform == "web") echo 'active'; ?>">
                            <a class="nav-link" href="index?platform=web">Web</a>
                        </li>
                        <li class="nav-item <?php if ($platform == "mobile") echo 'active'; ?>">
                            <a class="nav-link" href="index?platform=mobile">Mobile</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                if($view){
                    if(file_exists("platform/view.php")){
                        include("platform/view.php");
                    }
                }else if ($platform) {
                    if (file_exists("platform/$platform.php"))
                        include("platform/$platform.php");
                    else
                        include("biodata.php");
                } else
                    include("biodata.php");
                ?>
            </div>
        </div>
    </div>
    <footer class="page-footer font-small" style="background: #810006">
        <div class="col-md-12">
            <nav class="bg-danger col-md-12">
                <div class="footer-copyright text-center py-3" style="padding-bottom: 0.1rem !important; padding-top: 0.1rem !important;">
                    <ul class="social-icon">
                        <li class="bg-sosmed"><a target="_blank" href="https://www.facebook.com/TheArKasastra"><i class="fab fa-facebook-square"></i></a></li>
                        <li class="bg-sosmed"><a target="_blank" href="https://twitter.com/TheArKasastra"><i class="fab fa-twitter-square"></i></a></li>
                        <li class="bg-sosmed"><a target="_blank" href="https://www.linkedin.com/in/arifia-kasastra-2451a6160/"><i class="fab fa-linkedin"></i></i></a></li>
                        <li class="bg-sosmed" hidden><a target="_blank" href="#"><i class="fab fa-slack"></i></a></li>
                        <li class="bg-sosmed" hidden><a target="_blank" href="#"><i class="fab fa-dribbble-square"></i></a></li>
                    </ul>
                </div>
            </nav>
            <div class="footer-copyright text-center py-3">
                <span style="color: white">© 2020 Copyright </span><a href="https://themehippo.com">ResumeX</a> | 
                <span style="color: white">Developed as Needed by <a href="/">TheArKa</a></span>
            </div>
        </div>
    </footer>
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/senna.js" type="text/javascript"></script>
</body>

</html>