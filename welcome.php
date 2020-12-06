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
            <div class="light flex align-center space-between" style="font-size: 25px; width: 200px;">
                <i class="fa cursor-point">&#xf015;</i>
                <i class="fa cursor-point">&#xf007;</i>
                <i class="fa cursor-point">&#xf129;</i>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>

    <!-- main -->
    <div class="py-3 mt-2">
        <div class="position-fixed ml-5" style="width: 200px">
            <div class="img-replace flex-center round-5">img replace</div>
            <div class="w-100 p-2 mt-2">
                <h5>Alisa Illinichina Amiela</h5>
                <span>21 tahun / Perempuan</span>
                <div class="flex column w-100">
                    <span>+81-082-335-8765</span>
                    <span>amiela@alisa.com</span>
                    <span><img src="./assets/touch-dark.png" alt="" style="height: 20px; width: 20px;"> 200 Touches</span>
                </div>
            </div>
        </div>
        <div class=" position-fixed mr-5" style="width: 200px; right: 0;">
            <div >
                <input type="text" placeholder="cari user online" name="" id="" class="w-100 pl-4 p-2 round-5">
                <i class="fa" id="search-user-online">&#xf002;</i>
            </div>
            
            <!-- underline -->
            <div class="w-75"></div>

            <div class="p-1">
                <ul>
                    <li class="flex align-center p-2">
                        <div class="user-pict rounded-circle"></div>
                        <span class="mx-2">Daisuke</span>
                        <div class="circle-online bg-light-blue round-5"></div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="input-post mx-auto">
            <div contentEditable="true" class="round-5 p-2 px-3 w-100 bg-white input-sambat">
                Sambat Yok ...
                <img src="" alt="" id="img-preview__img">
                <video src="" id="video-preview" controls></video>
            </div>
            <div class="w-100 mt-2 clearfix">
                <span id="url-file"></span>
                <div class="float-right flex align-center">
                    <label>
                        <i class="fa cursor-point" style="font-size: 25px;">&#xf0c6;</i>
                        <input type="file" id="inputFile" style="display: none" />
                    </label>
                    <button class="btn btn-danger light ml-4">Lepaskan</button>
                </div>
            </div>
        </div>

        <ul>
            <li class="input-post">
                
            </li>
        </ul>
    </div>

    
    <script src="./script/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>