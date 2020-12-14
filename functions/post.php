<?php
	require_once "config.php";

	function select_post($id=0) {
		global $con;

		$hasil = array();

		if ($id != 0) $sql = "SELECT * FROM tb_post WHERE id_user = :id";
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
						$hasil[$i]['file_source'] = $val['file_source'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function select_post_id($idPost=0) {
		global $con;

		$hasil = array();

		if ($idPost != 0) $sql = "SELECT * FROM tb_post WHERE id = :id";
		else $sql = "SELECT * FROM tb_post";

		try {
            $stmt = $con->prepare($sql);
            if ($idPost != "") $stmt->bindValue(':id', $idPost, PDO::PARAM_INT);

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
						$hasil[$i]['file_source'] = $val['file_source'];
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
				$sql = "INSERT INTO tb_post VALUES (:id,:title, :content, :post_date, :id_user, :appreciate, :uninterest, :report, :status, :file_source)";
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
				$stmt->bindValue(':file_source', $data['file_source'], PDO::PARAM_STR);

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

	function appreciating($id_post=0){
		global $con;

		if ($id_post != null) {
			try {
				$dataTemp = select_post_id($id_post);
				$sql = "UPDATE tb_post SET appreciate = :app WHERE id = :id_post";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':app',$dataTemp[0]['appreciate']+1 , PDO::PARAM_INT);
				$stmt->bindValue(':id_post', $id_post, PDO::PARAM_INT);
				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}

	function uninteresting($id_post=0){
		global $con;

		if ($id_post != null) {
			try {
				$dataTemp = select_post_id($id_post);
				$sql = "UPDATE tb_post SET uninterest = :app WHERE id = :id_post";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':app',$dataTemp[0]['uninterest']+1 , PDO::PARAM_INT);
				$stmt->bindValue(':id_post', $id_post, PDO::PARAM_INT);
				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
?>