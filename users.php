<?php


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
    <!-- navigation -->
    <div class="bg-dark-blue w-50 position-fixed py-3 px-5" id="nav">
        <div class="w-100 mx-auto flex align-center space-between">
            <img src="./assets/light.png" alt="" id="main-page" class="">
        </div>  
    </div>
    <div class="bg-light-smoth w-50 position-fixed py-3 px-5" id="nav-right" style="right: 0;">
        <div class="w-100 mx-auto flex align-center flex-end-pos">
            <img src="./assets/light.png" alt="" id="main-page" class="" hidden>
            <div class="flex align-center space-between" style="font-size: 25px; width: 200px;">
                <!-- <a href="welcome.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf015;</i></a>
                <a href="profile.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf007;</i></a> -->
                <a href=""><i class="fa dark-blue cursor-point">&#xf015;</i></a>
                <a href=""><i class="fa dark-blue cursor-point">&#xf007;</i></a>
                <a href="logout.php"><i class="fa dark-blue cursor-point">&#xf129;</i></a>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>
    <!-- GRADIENT -->
    <div class="bg-light-grad w-50 position-fixed py-3 px-5" id="nav-right" style="right: 0; top: 69px"></div>
    <!-- GRADIENT END -->

    <!-- main -->
    <div class="w-50 h-100 position-fixed flex p-3 mt-2 column light bg-dark-blue overflow-scroll">
        <div class="w-50 mx-auto mt-5 overflow-hidden flex" id="foto-profile">
            <img src="./assets/sample2.jpg" alt="">
        </div>
        <div class="w-100 light my-2 text-center">
            <h5><u><i>Motto Gann</i></u></h5>
        </div>
        <hr>
        <form action="">
            <div class="w-100 p-2 flex">
                <div class="w-50">
                    <h6>Nama</h6>
                    <input name="nama" readonly type="text" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <h6>Email</h6>
                    <input name="email" readonly type="text" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <h6>Tanggal Lahir</h6>
                    <input name="tanggalLahir" readonly type="date" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                </div>
                <div class="w-50">
                    <h6>Jenis Kelamin</h6>
                    <input name="jekel" readonly type="text" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <h6>Nomor Telepon</h6>
                    <input name="noTelp" readonly type="text" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                </div>
            </div>
        </form>
    </div>
    <div class="w-100" style="z-index: 1">
        <div class="w-50 mt-5 overflow-scroll float-right">
            <ul class="mt-5">
                <li class="mt-5">
                    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                        <div class="tutup-posting round-5 flex-center column light">
                            <h3>Sambatan Dono</h3>
                            <button class="btn btn-dekati px-4 light-blue">Dekati</button>
                        </div>
                        <div class="w-100 h-100 flex-center">
                            <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img">
                            <video src="" id="post-video" hidden></video>
                        </div>
                    </div>
                </li>
                <li class="mt-5">
                    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                        <div class="tutup-posting round-5 flex-center column light">
                            <h3>Sambatan Dono</h3>
                            <button class="btn btn-dekati px-4 light-blue">Dekati</button>
                        </div>
                        <div class="w-100 h-100 flex-center">
                            <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img">
                            <video src="" id="post-video" hidden></video>
                        </div>
                    </div>
                </li>
                <li class="mt-5">
                    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                        <div class="tutup-posting round-5 flex-center column light">
                            <h3>Sambatan Dono</h3>
                            <button class="btn btn-dekati px-4 light-blue">Dekati</button>
                        </div>
                        <div class="w-100 h-100 flex-center">
                            <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img">
                            <video src="" id="post-video" hidden></video>
                        </div>
                    </div>
                </li>
                <li class="mt-5">
                    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                        <div class="tutup-posting round-5 flex-center column light">
                            <h3>Sambatan Dono</h3>
                            <button class="btn btn-dekati px-4 light-blue">Dekati</button>
                        </div>
                        <div class="w-100 h-100 flex-center">
                            <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img">
                            <video src="" id="post-video" hidden></video>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>
        

    
    <!-- <script src="./script/main.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./script/account.js"></script>
</body>
</html>