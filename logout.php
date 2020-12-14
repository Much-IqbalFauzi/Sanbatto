<?php
require_once "functions/user.php";
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
}else{
 $email = $_SESSION['email'];
 offline($email);
}

session_destroy();
// echo
//  '
// <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
// <div style="text-align:center; margin:auto; margin-top:50px">
// <div class="spinner-grow text-muted"></div>
// <div class="spinner-grow text-primary"></div>
// <div class="spinner-grow text-success"></div>
// <div class="spinner-grow text-info"></div>
// <div class="spinner-grow text-warning"></div>
// <div class="spinner-grow text-danger"></div>
// <div class="spinner-grow text-secondary"></div>
// <div class="spinner-grow text-dark"></div>
// <div class="spinner-grow text-light"></div>
//         <h1>Loging out...</h1>
//         </div>';
header("Refresh: 5; url=index.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="./style/layout.css" />
        <link rel="stylesheet" href="./style/style.css" />
        <title>perloading</title>
    </head>
    <body>
        <div class="all-page bg-dark-blue" id="preload-Page">
            <div class="fix-center" style="z-index: 99;">
                <img src="./assets/dark.png" alt="Sanbatto" id="preload" />
                <h3 class="light-blue-super text-center mt-4">
                    <i>Nikmati hidupmu, Bye...</i>
                </h3>
            </div>
            <div class="liquid-contaiter">
                <div class="liquid"></div>
            </div>
        </div>
    </body>
</html>
