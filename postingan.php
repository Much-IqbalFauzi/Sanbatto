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
            <div >
                <input type="text" placeholder="cari user online" name="" id="" class="w-100 pl-4 p-2 round-5">
                <i class="fa" id="search-user-online">&#xf002;</i>
            </div>
            <div class="p-1">
                <ul>
                    <li class="flex align-center p-2">
                        <div class="user-pict rounded-circle"></div>
                        <span class="mx-2">Daisuke</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- POSTING  -->
        <form method="post">
            <div class="input-post mx-auto">
                <input type="text" name="title" placeholder="Kamu ingin . . . marah / nangis / teriak ?" class="round-5 p-2 px-3 w-100 bg-white mb-2 border border-dark">
                <textarea  class="round-5 p-2 px-3 w-100 bg-white input-sambat border border-dark" placeholder="Sambat Yokk..." type="text" name="content"></textarea>
                <div class="w-100 mt-2 clearfix">
                    <span id="url-file"></span>
                    <div class="float-right flex align-center">
                        <label>
                            <i class="fa cursor-point" style="font-size: 25px;">&#xf0c6;</i>
                            <input type="file" id="inputImg" style="display: none"/>
                        </label>
                        <input type="submit" class="btn bg-light-green light ml-4" name="sambat" value="Lepaskan">
                    </div>
                </div>
                <div class="position-relative mt-2 px-4">
                    <img src="" alt="" id="img-preview">
                    <video src="" id="video-preview" controls></video>
                </div>
            </div>
        </form>
        <ul>
            <li class="mt-5">
                <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height border border-dark postingan">
                    <div class="tutup-posting round-5 flex-center column light">
                        <h3>Sambatan Dono</h3>
                        <button class="btn btn-dekati px-4 light-green">Dekati</button>
                    </div>
                    <div class="w-100 h-100 flex-center">
                        <img src="./assets/sample.jpg" alt="" id="post-img">
                        <video src="" id="post-video" hidden></video>
                    </div>
                    
                </div>
            </li>
        </ul>
    </div>

    
    <script src="./script/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./script/main.js"></script>
</body>
</html>