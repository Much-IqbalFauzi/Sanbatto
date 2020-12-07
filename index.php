<?php
    require_once "functions.php";

    if(isset($_SESSION['email'])){
        header("Location: welcome.php");
    }else{
        echo "<script>console.log('Debug Objects: oooo' );</script>";
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $password = $_POST['password']; 
            if(check_login($email,$password)){
                $_SESSION['email'] = $email;
                $_SESSION['user'] = select_user($email);
                header("Refresh:1; url=welcome.php?email=$email");
            }else{
                echo "password salah";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Welcome | Popular Site for Sambat</title>
</head>
<body>
    
    <div class="all-page fix-center flex space-around align-center">
        <div class="w-50 h-75 flex-center p-3 column box">
            <img src="./assets/light.png" alt="" id="logo-main">
            <div class="mt-3">
                <p class="text-center light">Ini merupakan web dimana kalian dipersilakan untuk <br><span class="light-blue"><b>mengeluh</b></span>. <br>Karena mengeluh <br> merupakan bagian dari <span class="light-blue"><b>kehidupan</b></span></p>
            </div>
        </div>
        <div class="w-50 h-75 flex-center p-3 column">
            <h3 class="mb-4">Sign In</h3>
            <form method="post" class="w-50">
                <div class="column flex-center w-100">
                    <input type="text" placeholder="Email" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100" name="email">
                    <input type="password" placeholder="Password" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100" name="password">
                    <input type="submit" name="login" class="round-5 mt-4 mb-2 p-2 w-50 bg-light-blue" value="MASUK">
                </div>
            </form>
            <div>
                <p>Belum punya akun? <a class="cursor-point light-green" href="register.php"><u>daftar disini</u></a></p>
            </div>
            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>