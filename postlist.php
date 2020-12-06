<!DOCTYPE html>
<html lang="en">

<head>
	<title>Post</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/layout.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
<h2>Post List</h2>
<?php
		require_once "functions.php";

		if (!isset($_SESSION['email'])) {
			header("Location: index.php");
		} else {

			$hapus = isset($_GET['hapus']) ? $_GET['hapus'] : "";
			if ($hapus != "") {
				$id = "";
				$data = select_post($hapus);
				if (sizeof($data) > 0) {
					if (delete_post($hapus)) echo '<div class="alert alert-success">Sukses hapus data </div>';
					else echo '<div class="alert alert-danger">Gagal hapus data </div>';
				} else {
					echo '<div class="alert alert-danger">post ('.$hapus.') tidak ditemukan!</div>';
				}
			}

			$data_table = '';
			$data = select_post();
			foreach ($data as $key => $val) {
				$data_table .= '
					<tr>
						<td>'.$val['id'].'</td>
						<td>'.$val['title'].'</td>
						<td>'.$val['content'].'</td>
                        <td>'.$val['post_date'].'</td>
                        <td>'.$val['id_user'].'</td>
                        <td>'.$val['appreciate'].'</td>
                        <td>'.$val['uninterest'].'</td>
                        <td>'.$val['report'].'</td>
						<td>'.$val['status'].'</td>  
						<td><a class="btn btn-danger text-light" href="postlist.php?hapus='.$val['id'].'">HAPUS</a><td>                 
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
						<th nowrap>Judul</th>
                        <th nowrap><center>Konten</center></th>
                        <th nowrap><center>Tanggal Post</center></th>
                        <th nowrap><center>Id User</center></th>
                        <th nowrap><center>Appreciate</center></th>
                        <th nowrap><center>Uninterest</center></th>
                        <th nowrap><center>Report</center></th>
                        <th nowrap><center>Status</center></th>
                    </tr>
					'.$data_table.'
				</table>
			';
		}
    ?>

    </body>
    </html>