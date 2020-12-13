<?php
	require_once "config.php";

	function select_user($email="") {
		global $con;

		$hasil = array();

		if ($email != "") $sql = "SELECT * FROM tbl_user WHERE email = :email";
		else $sql = "SELECT * FROM tbl_user";

		try {
            $stmt = $con->prepare($sql);
            if ($email != "") $stmt->bindValue(':email', $email, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['name'] = $val['name'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['birth_date'] = $val['birth_date'];
						$hasil[$i]['gender'] = $val['gender'];
						$hasil[$i]['phone'] = $val['phone'];
						$hasil[$i]['status'] = $val['status'];
						$hasil[$i]['touch'] = $val['touch'];
						$hasil[$i]['join_date'] = $val['join_date'];
						$hasil[$i]['life_motto'] = $val['life_motto'];
						$hasil[$i]['verified'] = $val['verified'];
						$hasil[$i]['file_source'] = $val['profile_photo'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function select_user_id($id=0) {
		global $con;

		$hasil = array();

		if ($id != "") $sql = "SELECT * FROM tbl_user WHERE id = :id";
		else $sql = "SELECT * FROM tbl_user";

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
        				$hasil[$i]['name'] = $val['name'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['birth_date'] = $val['birth_date'];
						$hasil[$i]['gender'] = $val['gender'];
						$hasil[$i]['phone'] = $val['phone'];
						$hasil[$i]['status'] = $val['status'];
						$hasil[$i]['touch'] = $val['touch'];
						$hasil[$i]['join_date'] = $val['join_date'];
						$hasil[$i]['life_motto'] = $val['life_motto'];
						$hasil[$i]['verified'] = $val['verified'];
						$hasil[$i]['file_source'] = $val['profile_photo'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function select_user_online() {
		global $con;

		$hasil = array();

		$sql = "SELECT * FROM tbl_user WHERE status = 1";

		try {
            $stmt = $con->prepare($sql);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['name'] = $val['name'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['birth_date'] = $val['birth_date'];
						$hasil[$i]['gender'] = $val['gender'];
						$hasil[$i]['phone'] = $val['phone'];
						$hasil[$i]['status'] = $val['status'];
						$hasil[$i]['touch'] = $val['touch'];
						$hasil[$i]['join_date'] = $val['join_date'];
						$hasil[$i]['life_motto'] = $val['life_motto'];
						$hasil[$i]['verified'] = $val['verified'];
						$hasil[$i]['file_source'] = $val['profile_photo'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}
		return $hasil;
	}


	function select_user_name($name="") {
		global $con;

		$hasil = array();

		if ($name != "") $sql = "SELECT * FROM tbl_user WHERE name = :name";
		else $sql = "SELECT * FROM tbl_user";

		try {
            $stmt = $con->prepare($sql);
            if ($name != "") $stmt->bindValue(':name', $name, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['name'] = $val['name'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['birth_date'] = $val['birth_date'];
						$hasil[$i]['gender'] = $val['gender'];
						$hasil[$i]['phone'] = $val['phone'];
						$hasil[$i]['status'] = $val['status'];
						$hasil[$i]['touch'] = $val['touch'];
						$hasil[$i]['join_date'] = $val['join_date'];
						$hasil[$i]['life_motto'] = $val['life_motto'];
						$hasil[$i]['verified'] = $val['verified'];
						$hasil[$i]['file_source'] = $val['profile_photo'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

	function check_login($email="",$password=""){
		global $con;
		$sql = "SELECT email FROM tb_login WHERE email = :email AND password = :password";

		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':email', $email, PDO::PARAM_STR);
			$stmt->bindValue(':password', $password, PDO::PARAM_STR);

			if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();

        		if ($rs != null) {
					return true;
				}
			}

		}catch(Exceptio $e){
			echo 'Error Password / Email';
		}
		
	}

	function insert_user($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tbl_user VALUES (:id ,:name, :email, :birth_date, :gender, :phone, :status, :touch, :join_date,:life_motto,:verified,:file_source)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', 0, PDO::PARAM_INT);
				$stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
				$stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
				$stmt->bindValue(':birth_date', "", PDO::PARAM_STR);
				$stmt->bindValue(':gender', $data['gender'], PDO::PARAM_STR);
				$stmt->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
				$stmt->bindValue(':status', 1, PDO::PARAM_INT);
				$stmt->bindValue(':touch', 0, PDO::PARAM_INT);
				$stmt->bindValue(':join_date', date("Y/m/d"), PDO::PARAM_STR);
				$stmt->bindValue(':life_motto', "", PDO::PARAM_STR);
				$stmt->bindValue(':verified', "", PDO::PARAM_INT);
				$stmt->bindValue(':file_source', "", PDO::PARAM_STR);
				if ($stmt->execute()) $ok = true;
				else return false;

				$sql = "INSERT INTO tb_login VALUES (:email, :password)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
				$stmt->bindValue(':password', $data['password'], PDO::PARAM_STR);

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

	function update_user($email="",$data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "UPDATE tbl_user SET name = :name, birth_date = :birth_date, gender = :gender, phone = :phone, status = :status, life_motto = :life_motto, verified = :verified, profile_photo=:file_source  WHERE email = :email";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
				$stmt->bindValue(':email', $email, PDO::PARAM_STR);
				$stmt->bindValue(':birth_date', $data['birth_date'], PDO::PARAM_STR);
				$stmt->bindValue(':gender', $data['gender'], PDO::PARAM_STR);
				$stmt->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
				$stmt->bindValue(':status', $data['status'], PDO::PARAM_INT);
				$stmt->bindValue(':life_motto', $data['life_motto'], PDO::PARAM_STR);
				$stmt->bindValue(':verified', $data['verified'], PDO::PARAM_INT);
				$stmt->bindValue(':file_source', $data['file_source'], PDO::PARAM_STR);
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

	function delete_user($id="") {
		global $con;

		if ($id != "") {
			try {
				$mail = "";
				$getMail = "SELECT email FROM tbl_user WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);
				if ($stmt->execute()) $mail = $val['email'];
				else return false;

				$sql = "DELETE FROM tbl_user WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_INT);
				if ($stmt->execute()) $ok = true;
				else return false;

				$sql = "DELETE FROM tbl_login WHERE email = :email";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $email, PDO::PARAM_STR);
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


