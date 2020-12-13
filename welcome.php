<?php
     require_once "functions/user.php";
     require_once "functions/post.php";

     if (!isset($_SESSION['email'])) {
        header("Location: index.php");
    }else{
     $email = isset($_GET['email']) ? $_GET['email'] : "";
     $data = select_user($email);   
    
     if (isset($_POST['sambat'])) {
         $sambatan['content'] = isset($_POST['content']) ? $_POST['content'] : "";
         $sambatan['id_user'] = isset($data[0]['id'])?$data[0]['id']:"";
         $sambatan['title'] = isset($_POST['title'])?$_POST['title']: "";

         if ($sambatan['content'] == "" || $sambatan['id_user']== "") {
             echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!'.$sambatan['content'].' '.$sambatan['id_user'].'</div>';
         } else {
                 if (insert_post($sambatan)) {echo '<div class="alert alert-success">Sukses tambah post!</div>';
                 header("Refresh:1; url=welcome.php?email=$email");}
                 else echo '<div class="alert alert-danger">Gagal tambah data user!</div>';
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
    <!-- navigation -->
    <div class="bg-dark-blue w-100 sticky-top py-3 px-5" id="nav">
        <div class="w-100 mx-auto flex align-center space-between">
            <img src="./assets/light.png" alt="" id="main-page" class="ml-">
            <div class="flex align-center space-between" style="font-size: 25px; width: 200px;">
                <!-- <a href="welcome.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf015;</i></a>
                <a href="profile.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf007;</i></a> -->
                <a href=""><i class="fa light cursor-point">&#xf015;</i></a>
                <a href=""><i class="fa light cursor-point">&#xf007;</i></a>
                <a href=""><i class="fa light cursor-point">&#xf129;</i></a>
                <a href="logout.php"><i class="fa dark-blue cursor-point">	&#xf08b;</i></a>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>

    <!-- main -->
    <?php

    echo '
    <div class="py-3 mt-2">
        <div class="position-fixed ml-5" style="width: 200px">
            <div class="img-replace flex-center round-5 shadow">img replace</div>
            <div class="w-100 p-2 mt-2">
            <h5>'.$data[0]['name'].'</h5>
            <span>'.$data[0]['birth_date'].' / '.$data[0]['gender'].'</span>
            <div class="flex column w-100">
                <span>'.$data[0]['phone'].'</span>
                <span>'.$data[0]['email'].'</span>
                <span><img src="./assets/touch-dark.png" alt="" style="height: 20px; width: 20px;">'.$data[0]['touch'].' Touches</span>
            </div>
            </div>
        </div>
        ';?>
        <!-- SIDE -->
        <div class=" position-fixed mr-5" style="width: 200px; right: 0;">
            <div >
                <input type="text" placeholder="cari user online" name="" id="" class="w-100 pl-4 p-2 round-5 shadow-sm">
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
        <form method="post">
            <div class="input-post mx-auto">
                <input type="text" name="title" placeholder="Bagaimana perasaanmu ?" class="round-5 p-2 px-3 w-100 bg-white mb-2 shadow">
                <textarea  class="round-5 p-2 px-3 w-100 bg-white input-sambat shadow" placeholder="Sambat Yokk..." type="text" name="content"></textarea>
                <div class="w-100 mt-2 clearfix">
                    <span id="url-file"></span>
                    <div class="float-right flex align-center">
                        <label>
                            <i class="fa cursor-point" style="font-size: 25px;">&#xf0c6;</i>
                            <input type="file" id="inputImg" style="display: none"/>
                        </label>
                        <input type="submit" class="btn bg-light-blue dark-blue ml-4" name="sambat" value="Lepaskan">
                    </div>
                </div>
                <div class="postingan-media px-4 py-2 rounded shadow overflow-hidden flex-center hide" id="media-placement">
                    <div class="h-100 w-100 tutup-media">
                        <i class="fa cursor-point light float-right m-2" onclick="closemedia()">&#xf00d;</i>
                    </div>
                    <img src="" alt="" id="img-preview" height="100px" width="auto">
                    <video src="" id="video-preview" controls></video>
                </div>
            </div>
        </form>
        <?php
        $data_table = '';
        $postingan = select_post();
        foreach ($postingan as $key => $val) {
            $data_table .= '
                <li class="mt-5">
                <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                    <div class="tutup-posting round-5 flex-center column light">
                        <h3>'.$val['title'].'</h3>
                        <button class="btn btn-dekati px-4 light-blue"><a href="postingan.php?email='.$email.'&id_post='.$val['id'].'">Dekati</a></button>
                    </div>
                    <div class="w-100 h-100 flex-center">
                        <img src="./assets/sample.jpg" alt="" class="rounded" id="post-img">
                        <video src="" id="post-video" hidden></video>
                    </div>
                    
                </div>
            </li>
            ';
        }

        echo'
        
        <ul>
            '.$data_table.'
        </ul>';
        ?>
    </div>

    
    <script src="./script/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./script/main.js"></script>
</body>
</html>