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
<div class="bg-dark-blue w-100 sticky-top py-3 px-5" id="nav">
        <div class="w-100 mx-auto flex align-center space-between">
            <img src="./assets/light.png" alt="" id="main-page" class="ml-">
            <div class="flex align-center space-between" style="font-size: 25px; width: 200px;">
                <!-- <a href="welcome.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf015;</i></a>
                <a href="profile.php?email=<?php //echo $data[0]['email'] ?> "><i class="fa cursor-point">&#xf007;</i></a> -->
                <?php echo '
                <a href=""><i class="fa light cursor-point">&#xf129;</i></a>
                <a href="logout.php"><i class="fa light cursor-point">	&#xf08b;</i></a>
                ';?>
                <!-- <i class="fa"></i> -->
            </div>
        </div>  
    </div>

    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
    <h2><a href="profilelist.php">Profile List</a></h2>
    </div>
    <div class="overflow-hidden mx-auto input-post round-5 p-3 main-post-height shadow postingan">
    <h2><a href="postlist.php">Post List</a></h2<
    </div>
</body>
</html>