<?php
    require_once "functions/post.php";
    require_once "functions/user.php";
    require_once "functions/comment.php";

    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
    } else {
        $email = isset($_GET['email']) ? $_GET['email'] : "";
        $idPost = isset($_GET['id_post'])?$_GET['id_post']:"";
        $komentator = select_user($email);
        $postData = select_post_id($idPost);
        $userData = select_user_id($postData[0]['id_user']);

        if (isset($_POST['komentar'])) {
            $komentar['comment'] = isset($_POST['comment'])?$_POST['comment']:"";
            $komentar['id_user'] = $komentator[0]['id'];
            $komentar['id_post'] = $idPost;

            if($komentar['comment']==""){
                echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!'.$komentar['comment'].'</div>';
            }else{
                if (insert_comment($komentar)) {
                    echo '<div class="alert alert-success">Sukses tambah post!</div>';
                    header("Refresh:1; url=postingan.php?email=$email&id_post=$idPost");}
                    else echo '<div class="alert alert-danger">Gagal tambah data user!'.$komentator[0]['id'].'</div>';
            
            }

        }

        if(isset($_GET['appreciate'])){
            appreciating($idPost);
        }else if(isset($_GET['not'])){
            uninteresting($idPost);
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
    <title>Sambatan ... | SANBATTO | Popular Site for Sambat</title>
</head>
<body>
    <!-- navigation -->
    <div class="bg-dark-blue w-100 sticky-top py-3 px-5" id="nav">
        <div class="w-100 mx-auto flex align-center space-between">
            <img src="./assets/light.png" alt="" id="main-page" class="ml-">
            <div class="flex align-center space-between" style="font-size: 25px; width: 200px;">
                <!-- <a href="welcome.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf015;</i></a>
                <a href="profile.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf007;</i></a> -->
                <?php echo '<a href="welcome.php?email='.$email.'"><i class="fa light cursor-point">&#xf015;</i></a>
                <a href="account.php?email='.$email.'"><i class="fa light cursor-point">&#xf007;</i></a>
                <a href=""><i class="fa light cursor-point">&#xf129;</i></a>
                <a href="logout.php"><i class="fa light cursor-point">	&#xf08b;</i></a>
                ';?>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>

    <!-- main -->
    <div class="py-3 mt-2">
        <!-- SIDE -->
        <div class=" position-fixed mr-5" style="width: 200px; right: 0;">
            <div>
                <input type="text" placeholder="cari user online" name="" id="userSearch" class="w-100 pl-4 p-2 round-5 border-sm">
                <i class="fa" id="search-user-online">&#xf002;</i>
            </div>
            <hr>
            <div class="p-1">
                <ul>
                <?php
                $online = select_user_online();
                foreach ($online as $key => $on) {
                echo'
                    <li class="flex align-center p-2 userItems" id="UserBlock">
                        <div class="user-pict rounded-circle"></div>
                        <span class="ml-2">'.$on['name'].'</span>
                    </li>';
                 } ?>
                </ul>
            </div>
        </div>
        <!-- POSTING  -->
        <?php
        $path = "";
        if($email==$userData[0]['email']){
            $path="account.php";
        }else{
            $path="users.php";
        }

        if(sizeof($postData)>0){
        echo'
        <div class="overflow-hidden mx-auto input-post round-5 p-3 shadow">
            <div class="w-100 flex align-center p-2">
                <div class="user-pict-lg rounded-circle"></div>
                <div class="ml-2">
                    <h5 class="mb-0"><a href="'.$path.'?email='.$userData[0]['email'].'" class=" dark-blue">'.$userData[0]['name'].'</a></h5>
                    <span class="light-blue-super">'.$postData[0]['post_date'].'</span>
                </div>
            </div>
            <div class="w-100 mt-2">
                <p>'.$postData[0]['content'].'</p>
            </div>
            <div class="w-100 h-100 flex-center mt-2">
                <img src="./'.$postData[0]['file_source'].'" alt="" class="rounded" id="post-img-profile" width="100%" height="auto">
                <video src="" id="post-video" hidden></video>
            </div>
            <div class="w-100 mt-2 px-2">
                <a href="postingan.php?email='.$email.'&id_post='.$idPost.'&appreciate=true"><i class="fa cursor-point mx-2 appreciate">&#xf087;</a><span>'.$postData[0]['appreciate'].'</span></i>
                <a href="postingan.php?email='.$email.'&id_post='.$idPost.'&not=true"><i class="fa cursor-point mx-2 not-interest">&#xf165;</a><span>'.$postData[0]['uninterest'].'</span></i>
            </div>
            <hr>
            ';
        }
            
        ?>
            <form action="" method="post">
                <div class="w-100 mt-2 flex align-center px-2">
                    <div class="user-pict rounded-circle"></div>
                    <input type="text" name="comment" class="ml-2 pl-4 p-2 round-5 shadow-sm w-100 float-right" placeholder="Yok..Tenangkan!">
                    <input type="submit" name="komentar">
                </div>
            </form>
            <hr>
            <ul>
            <?php
            $komentar = select_comment_post($idPost);
            foreach ($komentar as $key => $val) {
            echo'
                <li>
                    <div class="w-100 mt-2 flex align-center px-2">
                        <div class="user-pict rounded-circle"></div>
                        <div class="ml-2">
                            <h5>'.select_user_id($val['id_user'])[0]['name'].'</h5>
                            <p class="m-0">'.$val['comment'].'</p>
                            <span>'.$val['comment_date'].'</span>
                        </div>
                    </div>
                </li>
                ';
            }
                ?>
            </ul>
        </div>
    </div>

    
    <!-- <script src="./script/main.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./script/add.js"></script>
</body>
</html>