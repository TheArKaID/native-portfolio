<?php
include_once("../function/config.php");

$username = isset($_POST['username']) ? $connect->real_escape_string($_POST['username']) : false;
$password = isset($_POST['password']) ? $connect->real_escape_string($_POST['password']) : false;

if(!$username || !$password){
    header("location: index.php");
    die();
}

$hashed_password = crypt($password, PASSWORD_DEFAULT);

$checkUser = mysqli_query($connect, "SELECT token FROM config WHERE username = '$username' AND password = '$password'") or die(mysqli_error($connect));
$resultUser = mysqli_num_rows($checkUser);

if($resultUser!=1){
    header("location: index.php");
    die();
}

$data = mysqli_fetch_array($checkUser);
session_start();
$_SESSION["username"] = $username;
$_SESSION["token"] = $data['token'];

header("location: main.php");

?>