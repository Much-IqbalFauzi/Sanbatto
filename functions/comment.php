<?php
	require_once "config.php";

	function select_comment($id=0) {
		global $con;

		$hasil = array();

		if ($id != 0) $sql = "SELECT * FROM tb_comment WHERE id = :id";
		else $sql = "SELECT * FROM tb_comment";

		try {
            $stmt = $con->prepare($sql);
            if ($user != "") $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['comment'] = $val['comment'];
						$hasil[$i]['id_user'] = $val['id_user'];
						$hasil[$i]['id_post'] = $val['id_post'];
						$hasil[$i]['comment_date'] = $val['comment_date'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function select_comment_post($idPost=0) {
		global $con;

		$hasil = array();

		if ($idPost != 0) $sql = "SELECT * FROM tb_comment WHERE id_post = :id_post";
		else echo "no comment";

		try {
            $stmt = $con->prepare($sql);
            if ($idPost != "") $stmt->bindValue(':id_post', $idPost, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['comment'] = $val['comment'];
						$hasil[$i]['id_user'] = $val['id_user'];
						$hasil[$i]['id_post'] = $val['id_post'];
						$hasil[$i]['comment_date'] = $val['comment_date'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}


	function insert_comment($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tb_comment VALUES (:comment, :id_user, :id_post, :id_user, :comment_date)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':comment', $data['comment'], PDO::PARAM_STR);
				$stmt->bindValue(':id_user', $data['id_user'], PDO::PARAM_INT);
				$stmt->bindValue(':id_post', $data['id_post'], PDO::PARAM_INT);
				$stmt->bindValue(':comment_date', $data['comment_date'], PDO::PARAM_STR);
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

	function delete_comment($id="") {
		global $con;

		if ($id != "") {
			try {
				$sql = "DELETE FROM tb_comment WHERE id = :id";
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