<?php
function select_toucher($id=0) {
		global $con;

		$hasil = array();

		if ($id != "") $sql = "SELECT * FROM tb_toucher WHERE id_touched = :id";
		else $sql = "SELECT * FROM tb_toucher";

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
                        $hasil[$i]['id_toucher'] = $val['id_toucher'];
                        $hasil[$i]['id_touched'] = $val['id_touched'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}


	function select_semua_touch($id_toucher=0, $id_touched=0) {
		global $con;

		$hasil = array();

		if ($id_toucher != "") $sql = "SELECT * FROM tb_toucher WHERE id_touched = :id_touched AND id_toucher = :id_toucher";
		else $sql = "SELECT * FROM tb_toucher WHERE id_touched = :id_touched AND id_toucher = :id_toucher";

		try {
            $stmt = $con->prepare($sql);
			if ($id_touched != ""){
			$stmt->bindValue(':id_touched', $id_touched,  PDO::PARAM_INT);
			$stmt->bindValue(':id_toucher', $id_toucher,  PDO::PARAM_INT);
			}

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
        				$hasil[$i]['id'] = $val['id'];
                        $hasil[$i]['id_toucher'] = $val['id_toucher'];
                        $hasil[$i]['id_touched'] = $val['id_touched'];
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}

    function touching($data) {
		global $con;

		if ($data != null) {
			try {
				$sql = "INSERT INTO tb_toucher VALUES (:id ,:id_toucher, :id_touched)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', 0, PDO::PARAM_INT);
				$stmt->bindValue(':id_toucher', $data['toucher'], PDO::PARAM_INT);
				$stmt->bindValue(':id_touched', $data['touched'], PDO::PARAM_INT);
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

    function untouch($id_touched=0,$id_toucher=0) {
		global $con;

		if ($id_touched != "") {
			try {
				$sql = "DELETE FROM tb_toucher WHERE id_touched = :id_touched AND id_toucher = :id_toucher";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id_touched', $id_touched, PDO::PARAM_INT);
				$stmt->bindValue(':id_toucher', $id_toucher, PDO::PARAM_INT);
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