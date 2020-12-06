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

	function insert_user($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tbl_user VALUES (:id ,:name, :email, :birth_date, :gender, :phone, :status, :touch, :join_date,:life_motto)";
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

	function insert_post($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tb_post VALUES (:title, :content, :post_date, :id_user, :appreciate, :uninterest, :report, :status)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':title', $data['title'], PDO::PARAM_STR);
				$stmt->bindValue(':content', $data['content'], PDO::PARAM_STR);
				$stmt->bindValue(':post_date', $data['post_date'], PDO::PARAM_STR);
				$stmt->bindValue(':id_user', $data['id_user'], PDO::PARAM_INT);
				$stmt->bindValue(':appreciate', $data['appreciate'], PDO::PARAM_INT);
				$stmt->bindValue(':uninterest', $data['uninterest'], PDO::PARAM_INT);
				$stmt->bindValue(':report', $data['report'], PDO::PARAM_INT);
				$stmt->bindValue(':status', $data['status'], PDO::PARAM_INT);

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


	function update_user($email="",$data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "UPDATE tbl_user SET name = :name, birth_date = :birth_date, gender = :gender, phone = :phone, status = :status, life_motto = :life_motto  WHERE email = :email";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
				$stmt->bindValue(':email', $email, PDO::PARAM_STR);
				$stmt->bindValue(':birth_date', $data['birth_date'], PDO::PARAM_STR);
				$stmt->bindValue(':gender', $data['gender'], PDO::PARAM_STR);
				$stmt->bindValue(':phone', $data['phone'], PDO::PARAM_STR);
				$stmt->bindValue(':status', $data['status'], PDO::PARAM_INT);
				$stmt->bindValue(':life_motto', $data['life_motto'], PDO::PARAM_STR);
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
				if ($stmt->execute()) return false;
				else return false;

			} catch(Exception $e) {
				echo 'Error delete_data : '.$e->getMessage();
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