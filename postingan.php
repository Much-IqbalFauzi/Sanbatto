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
    <div class="bg-dark-blue w-100 sticky-top py-3 px-5" id="nav">
        <div class="w-100 mx-auto flex align-center space-between">
            <img src="./assets/light.png" alt="" id="main-page" class="ml-">
            <div class="flex align-center space-between" style="font-size: 25px; width: 200px;">
                <!-- <a href="welcome.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf015;</i></a>
                <a href="profile.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf007;</i></a> -->
                <a href=""><i class="fa light cursor-point">&#xf015;</i></a>
                <a href=""><i class="fa light cursor-point">&#xf007;</i></a>
                <a href="logout.php"><i class="fa light cursor-point">&#xf129;</i></a>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>

    <!-- main -->
    <div class="py-3 mt-2">
        <!-- SIDE -->
        <div class=" position-fixed mr-5" style="width: 200px; right: 0;">
            <div>
                <input type="text" placeholder="cari user online" name="" id="" class="w-100 pl-4 p-2 round-5 border-sm">
                <i class="fa" id="search-user-online">&#xf002;</i>
            </div>
            <hr>
            <div class="p-1">
                <ul>
                    <li class="flex align-center p-2">
                        <div class="user-pict rounded-circle"></div>
                        <span class="ml-2">Daisuke</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- POSTING  -->
        <div class="overflow-hidden mx-auto input-post round-5 p-3 shadow">
            <div class="w-100 flex align-center p-2">
                <div class="user-pict-lg rounded-circle"></div>
                <div class="ml-2">
                    <h5 class="mb-0"><a href="#" class=" dark-blue">Daisuke</a></h5>
                    <span class="light-blue-super">tanggal</span>
                </div>
            </div>
            <div class="w-100 mt-2">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque maxime laudantium officia repudiandae eaque necessitatibus minus natus, inventore ab nostrum iste aliquam odio architecto rem hic obcaecati quo aliquid! Exercitationem.</p>
            </div>
            <div class="w-100 h-100 flex-center mt-2">
                <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img-profile" width="100%" height="auto">
                <video src="" id="post-video" hidden></video>
            </div>
            <div class="w-100 mt-2 px-2">
                <i class="fa appreciate">&#xf087;</i>
            </div>
            <hr>
            <form action="">
                <div class="w-100 mt-2 flex align-center px-2">
                    <div class="user-pict rounded-circle"></div>
                    <input type="text" class="ml-2 pl-4 p-2 round-5 shadow-sm w-100 float-right" placeholder="Yok..Tenangkan!">
                </div>
            </form>
            <hr>
            <ul>
                <li>
                    <div class="w-100 mt-2 flex align-center px-2">
                        <div class="user-pict rounded-circle"></div>
                        <div class="ml-2">
                            <p class="m-0">Komentar</p>
                            <span>tanggal</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    
    <!-- <script src="./script/main.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- <script src="./script/main.js"></script> -->
</body>
</html>