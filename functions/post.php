<?php
	require_once "config.php";

	function select_post($id=0) {
		global $con;

		$hasil = array();

		if ($id != 0) $sql = "SELECT * FROM tb_post WHERE id = :id";
		else $sql = "SELECT * FROM tb_post";

		try {
            $stmt = $con->prepare($sql);
            if ($id != "") $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['title'] = $val['title'];
						$hasil[$i]['content'] = $val['content'];
						$hasil[$i]['post_date'] = $val['post_date'];
						$hasil[$i]['id_user'] = $val['id_user'];
						$hasil[$i]['appreciate'] = $val['appreciate'];
						$hasil[$i]['uninterest'] = $val['uninterest'];
						$hasil[$i]['report'] = $val['report'];
						$hasil[$i]['status'] = $val['status'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function insert_post($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tb_post VALUES (:id,:title, :content, :post_date, :id_user, :appreciate, :uninterest, :report, :status)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id',0,PDO::PARAM_INT);
				$stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
				$stmt->bindValue(':content', $data['content'], PDO::PARAM_STR);
				$stmt->bindValue(':post_date', date("Y/m/d"), PDO::PARAM_STR);
				$stmt->bindValue(':id_user', $data['id_user'], PDO::PARAM_INT);
				$stmt->bindValue(':appreciate', 0, PDO::PARAM_INT);
				$stmt->bindValue(':uninterest', 0, PDO::PARAM_INT);
				$stmt->bindValue(':report', 0, PDO::PARAM_INT);
				$stmt->bindValue(':status', 1, PDO::PARAM_INT);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error insert_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}

	function delete_post($id="") {
		global $con;

		if ($id != "") {
			try {
				$sql = "DELETE FROM tb_comment WHERE id_post = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);
				if ($stmt->execute()) $oke=true;
				else return false;

				$sql = "DELETE FROM tb_post WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);
				if ($stmt->execute()) return true;
				else return false;

			} catch(Exception $e) {
				echo 'Error delete_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
?>