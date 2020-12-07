<!DOCTYPE html>
<html lang="en">

<head>
	<title>Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<h2>Profile</h2>
<a href="logout.php">Logout</a>
<?php
 require_once "functions.php";

 if (!isset($_SESSION['email'])) {
     header("Location: index.php");
 } else {
     $email = isset($_GET['email']) ? $_GET['email'] : "";
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

            if ($new_data['name'] == "" || $new_data['birth_date'] == "" ||$new_data['gender'] == "" ||  
            $new_data['phone'] == "" || $new_data['status'] == "" || $new_data['life_motto'] == ""
            || $new_data['verified'] == "") {
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
     if (sizeof($data) > 0) {
         echo '
         <div class="container">
         <div class="img-replace flex-center round-5" style="width:25%; margin:auto">img replace</div>
             <form method="post" action="profile.php?email='.$data[0]['email'].'">
                 <table class="table table-bordered table-hover">
                      <tr>
                         <th class="table-info" width="15%" nowrap>Email</th>
                         <td><input type="text" class="form-control" value="'.$data[0]['email'].'" disabled ></td>
                     </tr>
                     <tr>
                         <th class="table-info">Nama</th>
                         <td><input class="form-control" type="text" name="name" value="'.$data[0]['name'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Tanggal Lahir</th>
                         <td><input class="form-control" type="text" name="birth_date" value="'.$data[0]['birth_date'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Jenis Kelamin</th>
                         <td><input class="form-control" type="text" name="gender" value="'.$data[0]['gender'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Telepon</th>
                         <td><input class="form-control" type="text" name="phone" value="'.$data[0]['phone'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Status</th>
                         <td><input class="form-control" type="text" name="status" value="'.$data[0]['status'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Touch</th>
                         <td><input class="form-control" type="text" name="touch" value="'.$data[0]['touch'].'"disabled required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Join Date</th>
                         <td><input class="form-control" type="text" name="join_date" value="'.$data[0]['join_date'].' " disabled required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Life Motto</th>
                         <td><input class="form-control" type="text" name="life_motto" value="'.$data[0]['life_motto'].'" required></td>
                     </tr>
                     <tr>
                         <th class="table-info">Verified</th>
                         <td><input class="form-control" type="text" name="verified" value="'.$data[0]['verified'].'" required></td>
                     </tr>
                     <tr>
                         <td colspan="2">
                         <input class="btn btn-warning text-light" type="submit" name="ganti" value="GANTI">
                         </td>
                     </tr>
                 </table>
             </form>
             </div>
         ';
 
     }
    }
?>
</body>
</html>