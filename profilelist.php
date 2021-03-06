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
<h2>Profile List</h2>
<?php
		require_once "functions/user.php";

		if (!isset($_SESSION['email'])) {
			header("Location: index.php");
		} else {
			$data_table = '';
			$data = select_user();
			foreach ($data as $key => $val) {
				$data_table .= '
					<tr>
						<td><center><a href="profile.php?email='.$val['email'].'">'.$val['id'].'</a></center></td>
						<td>'.$val['name'].'</td>
						<td>'.$val['email'].'</td>
                        <td>'.$val['birth_date'].'</td>
                        <td>'.$val['gender'].'</td>
                        <td>'.$val['phone'].'</td>
                        <td>'.$val['status'].'</td>
                        <td>'.$val['touch'].'</td>
                        <td>'.$val['join_date'].'</td>
						<td>'.$val['life_motto'].'</td>   
						<td>'.$val['verified'].'<td>                 
                    </tr>
				';
			}

			if ($data_table == "") {
				$data_table = '<tr class="table-danger"><th colspan="4"><center>NO DATA</center></th></tr>';
			}

			echo '
				<table class="table table-bordered table-hover">
					<tr class="table-success">
						<th nowrap><center>Id</center></th>
						<th nowrap>Nama</th>
                        <th nowrap><center>Email</center></th>
                        <th nowrap><center>Tanggal Lahir</center></th>
                        <th nowrap><center>Jenis Kelamin</center></th>
                        <th nowrap><center>Telepon</center></th>
                        <th nowrap><center>Status</center></th>
                        <th nowrap><center>Touch</center></th>
                        <th nowrap><center>Tanggal Join</center></th>
                        <th nowrap><center>Moto Hidup</center></th>
						<th nowrap><center>terverifikasi</center></th>
						</tr>
					'.$data_table.'
				</table>
			';
		}
    ?>

    </body>
    </html>