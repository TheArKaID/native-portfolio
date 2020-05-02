<?php

    session_start();
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : false;
    $token = isset($_SESSION["token"]) ? $_SESSION["token"] : false;
    if($username && $token){
        header("location: main");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/bootstrap.js" type="text/javascript"></script>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/stylein.css" />
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <title>King of the Pages</title>
</head>

<body>
    <div class="container">
        <div class="col-md-4 centered">
            <form action="checkKing.php" method="post">
                <input class="form-control" type="text" name="username" id="username" placeholder="USERNAME" required>
                <input class="form-control" type="password" name="password" id="password" placeholder="PASSWORD" required>
                <input class="btn btn-danger" style="width:100%" type="submit" value="Masuk">
            </form>
        </div>
    </div>

</body>

</html>