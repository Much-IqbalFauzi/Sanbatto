<?php
		if (isset($_SESSION['email'])) {
			header("Location: welcome.php");
		} else {
            require_once "functions/user.php";
			if (isset($_POST['tambah'])) {
				$tambah_data['name'] = isset($_POST['name']) ? $_POST['name'] : "";
				$tambah_data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : "";
				$tambah_data['gender'] = isset($_POST['gender']) ? $_POST['gender'] : "";
				$tambah_data['email'] = isset($_POST['email']) ? $_POST['email'] : "";
				$tambah_data['password'] = isset($_POST['password']) ? $_POST['password'] : "";

                if ($tambah_data['name'] == "" || $tambah_data['phone'] == "" || $tambah_data['gender'] == ""
                 || $tambah_data['email'] == "" ||$tambah_data['password'] == "") {
					echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!</div>';
				} else {
					$data = select_user($tambah_data['email']);
					if (sizeof($data) > 0) {
						echo '<div class="alert alert-danger">email ('.$tambah_data['email'].') sudah terdaftar!</div>';
					} else {
						if (insert_user($tambah_data)) echo '<div class="alert alert-success">Sukses tambah data user!</div>';
						else echo '<div class="alert alert-danger">Gagal tambah data user!</div>';
					}
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
        <div class="w-50 h-75 flex-center p-3 column">
            <h3 class="mb-4">Sign Up</h3>
            <form action="" method="post" class="w-50">
                <div class="column flex-center w-100">
                    <input type="text" placeholder="Name" name="name" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100">
                    <input type="text" placeholder="Phone number" name="phone" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100">
                    <div class="w-100 my-2 py2 px3 flex">
                        <div class="ml-2">
                            <input type="radio" name="gender" value="Laki-laki"> <span>Laki-Laki</span>
                        </div>
                        <div class="ml-5">
                            <input type="radio" name="gender"   value="Laki-laki"> <span>Perempuan</span>
                        </div>
                        
                    </div>
                    <input type="text" placeholder="Email" name="email" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100">
                    <input type="password" placeholder="Password" name="password" class="round-5 light bg-dark-blue my-2 py-2 px-3 w-100">
                    <div class="my-2 py-2 px-3 w-100">
                        <input type="checkbox" require class="mr-2"><span>Saya setuju dengan kebijakan <u><a href="">Privacy and Policy</a></u></span>. serta <u><a href="">User Agreement</a></u></span>
                    </div>
                    <input class="round-5 mt-4 mb-2 p-2 w-50 bg-light-blue" type="submit" name="tambah" value="Daftar">
                </div>
            </form>
            <div>
                <p>Punya akun? <a class="cursor-point light-green"><u>Login</u></a></p>
            </div>
        </div>
        <div class="w-50 h-75 flex-center p-3 column box">
            <img src="./assets/light.png" alt="" id="logo-main">
            <div class="mt-3">
                <p class="text-center light">Pada era yang serba canggih, <br>banyak manusia sering sekali <span class="light-red"><b>melupakan</b></span> <br> perasaan sejati mereka. <br> hati mereka mati ditimbun oleh <span class="light-red"><b>unek-unek</b></span> <br> yang tak kunjung keluar.</p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>