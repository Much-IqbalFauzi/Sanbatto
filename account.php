<?php
    require_once "functions/user.php";

    if (!isset($_SESSION['email'])) {
        header("Location: index.php");
    } else {
        $email = isset($_GET['email']) ? $_GET['email'] : "";
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
                <?php
                echo'
                <a href="welcome.php?email='.$email.'"><i class="fa dark-blue cursor-point">&#xf015;</i></a>
                <a href="account.php?email='.$email.'"><i class="fa dark-blue cursor-point">&#xf007;</i></a>
                <a href=""><i class="fa dark-blue cursor-point">&#xf129;</i></a>
                <a href="logout.php"><i class="fa dark-blue cursor-point">	&#xf08b;</i></a>
                ';
                ?><!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>
    <!-- GRADIENT -->
    <div class="bg-light-grad w-50 position-fixed py-3 px-5" id="nav-right" style="right: 0; top: 69px"></div>
    <!-- GRADIENT END -->

    <!-- main -->
    <?php
    $fileDestination="";
        if(isset($_FILES['img-profile'])){
            echo "ini di set";
            $file = $_FILES['img-profile'];
            $fileName = $_FILES['img-profile']['name'];
            $fileTmpName = $_FILES['img-profile']['tmp_name'];
            $fileSize = $_FILES['img-profile']['size'];
            $fileError = $_FILES['img-profile']['error'];
            $fileType = $_FILES['img-profile']['type'];
           echo $fileName;
           $fileExt = explode('.', $fileName);
           $fileActualExt = strtolower(end($fileExt));
           
           $allowed = array('jpg', 'jpeg', 'png');
           if(in_array($fileActualExt, $allowed)){
               if($fileError===0){
                   if($fileSize<1000000){
                       $fielNameNew = uniqid('', true).".".$fileActualExt;
                       $fileDestination = 'uploads/'.$fielNameNew;
                       move_uploaded_file($fileTmpName, $fileDestination);
                       
                   }else{
                       echo "maaf, file terlalu besar";
                   }
               }else{
                   echo "maaf, terjadi kesalahan saat menguplad";
               }
           }else{
               echo "duh".$file."tipe file tidak bisa diupload";
           }
       }

        $data_table = '';       
        if ($email != "") {
           if (isset($_POST['ganti'])) {
               $new_data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
               $new_data['birth_date'] = isset($_POST['birth_date']) ? $_POST['birth_date'] : "";
               $new_data['gender'] = isset($_POST['gender']) ? $_POST['gender'] : "";
               $new_data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : "";
               $new_data['status'] = isset($_POST['status']) ? $_POST['status'] : "";
               $new_data['life_motto'] = isset($_POST['life_motto']) ? $_POST['life_motto'] : "";
               $new_data['touch'] = isset($_POST['touch']) ? $_POST['touch'] : "";
               $new_data['join_date'] = isset($_POST['join_date']) ? $_POST['join_date'] : "";
               $new_data['verified'] = isset($_POST['verified']) ? $_POST['verified'] : "";
               $new_data['file_source'] = $fileDestination?$fileDestination:"";
               if ($new_data['name'] == "" || $new_data['birth_date'] == "" ||$new_data['gender'] == "" ||  
               $new_data['phone'] == "" || $new_data['life_motto']=="") {
                   echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!</div>';
               } else {
                   $data = select_user($email);
                   if (sizeof($data) > 0) {
                       if (update_user($email ,$new_data)) echo '<div class="alert alert-success">Sukses ganti data user!</div>';
                       else echo '<div class="alert alert-danger">Gagal ganti data user"</div>';
                   } else {
                       echo '<div class="alert alert-danger">email tidak ditemukan!</div>';
                   }
               }
           }
        }
    

    $data = select_user($email);
    if(sizeof($data) > 0){
        echo '
   <form  method="post" action="account.php?email='.$data[0]['email'].'" enctype="multipart/form-data">
    <div class="w-50 h-100 position-fixed flex p-3 mt-2 column light bg-dark-blue overflow-scroll">
        <div class="w-50 mx-auto mt-5 overflow-hidden flex" id="foto-profile">
        <div class="w-100 bg-dark-blue flex-center" id="profile-photo">
                <label>
                    <i class="fa cursor-point light">&#xf030;</i>
                    <input type="file" id="inputPhoto" name="img-profile" style="display: none"/>
                </label>
        </div>
        <img src="'.$data[0]['file_source'].'" alt="" id="img-profile">
        </div>
        <div class="w-100 light my-2 text-center">
            <input type="text" name="life_motto" value="'.$data[0]['life_motto'].'">
            <h5><img class="cursor-point" onclick="touching()" src="./assets/touch-light.png" alt="" style="height: 25px; width: 25px;">'.$data[0]['touch'].' Toucher</h5>
        </div>
        <hr>
        
            <div class="w-100 p-2 flex">
                <div class="w-50">
                <input onkeypress="showSaveBtn()" type="hidden" name="status" value="'.$data[0]['status'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                <input onkeypress="showSaveBtn()" type="hidden" name="touch" value="'.$data[0]['touch'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                <input onkeypress="showSaveBtn()" type="hidden" name="join_date" value="'.$data[0]['join_date'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                <input onkeypress="showSaveBtn()" type="hidden" name="verified" value="'.$data[0]['verified'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                
                    <h6>Nama</h6>
                    <input onkeypress="showSaveBtn()" type="text" name="name" value="'.$data[0]['name'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <h6>Email</h6>
                    <input onkeypress="showSaveBtn()" type="text" name="email" value="'.$data[0]['email'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <h6>Tanggal Lahir</h6>
                    <input onkeypress="showSaveBtn()" type="date" name="birth_date" value="'.$data[0]['birth_date'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                </div>
                <div class="w-50">
                    <h6>Jenis Kelamin</h6>
                    <select onchange="showSaveBtn()" name="gender" id="gender" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                        <option value="none">Tidak diketahui</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <h6>Nomor Telepon</h6>
                    <input onkeypress="showSaveBtn()" type="text" name="phone" value="'.$data[0]['phone'].'" class="w-75 light bg-dark-blue py-1 mb-2 px-3 profile-border round-5">
                    <input onkeypress="showSaveBtn()" type="submit" class="mt-4 btn bg-light-blue dark-blue ml-4" name="ganti" value="Simpan" id="profile-save">
                </div>
            </div>
        </form>
        ';
    
    require_once "functions/post.php";
    $post_account = select_post($data[0]['id']);
    $data_post="";
    foreach ($post_account as $key => $val) {
        $data_post ='
        <li class="mt-5">
                    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
                        <div class="tutup-posting round-5 flex-center column light">
                            <h3>Sambatan '.$data[0]['name'].'</h3>
                            <h4>'.$val['title'].'</h4>
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
    
    }
  ?>
    </div>
    <div class="w-100" style="z-index: 1">
        <div class="w-50 mt-5 overflow-scroll float-right">
            <ul class="mt-5">
               <?php
                    echo $data_post;
               ?>
            </ul>
        </div>

    </div>
    
    
    
    <!-- <script src="./script/main.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="./script/account.js"></script>
</body>
</html>