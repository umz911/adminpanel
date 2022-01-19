<?php 
	session_start();
	class MyDb{
		
		public $conn = "";

		function __construct($servername = "localhost", $username = "root", $password = "",$db='new_school'){
			$this->conn = new mysqli($servername, $username, $password,$db) or die("Connection failed");
		}	
		
		// CREATING SESSION
		public function set_session($data){
			$_SESSION['user'] = $data;
		}
		public function is_logged_in(){
			if((!isset($_SESSION['user']))){
				header("location:login.php");
			}
		}
		public function logout(){
			session_unset();
			session_destroy();
			header("location:login.php");
		}
		public function login($data){			
			extract($data);
			$query	= "SELECT * FROM `users` where `username` = '$username' and `password` = '$password' ";
			$res 	= $this->conn->query($query);

			if ($res->num_rows>0) {	

				$record = $res->fetch_assoc();
				if (isset($record['username'])) {	
					$this->set_session($record);
					return true;
				}
				else{
					return false;
				}
			}			
		}

		public function add_teacher($data){
			extract($data);
			$query  =  "INSERT INTO `teacher`(`name`, `email`, `subject`) VALUES ('$name','$email','$subject')";
			$res 	= $this->conn->query($query);
			return $res;
		}
		public function fetch_teachers(){
			$query = "SELECT * FROM `teacher` ";
			$res 	= $this->conn->query($query);
			$i = 0;
			$data = array();
			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
				$i++;
			}
			
			return $data;
		}
		public function add_student($data){
			extract($data);
			$query  =  "INSERT INTO `student`(`name`, `email`, `class`) VALUES ('$fname','$email','$class')";
			$res 	= $this->conn->query($query);
			return $res;
		}
		public function fetch_student(){
			$query = "SELECT * FROM `student` ";
			$res 	= $this->conn->query($query);

			$i = 0;
			$data = array();

			while ($rows = $res->fetch_assoc()) {
				foreach ($rows as $key => $value) {
					$data[$i][$key] = $value;
				}
				$i++;
			}
			
			return $data;
		}
		public function update($table,$params=array(),$where = null){

			if ($this->tableExists($table)) {

				$args = array();
				
				foreach ($params as $key => $value) {
					
					$args[] = "$key = '$value'";
				}

				$sql = "UPDATE $table SET ".implode(', ', $args);
				
				if ($where != null) {

					$sql .= " WHERE $where";
				}

				if ($this->mysqli->query($sql)) {

					array_push($this->result, $this->mysqli->affected_rows);

				}else{
					array_push($this->result, $this->mysqli->error);
				}

			}
			else{
				return false;
			}
		}
		public function delete($table,$where = null){
			
			if ($this->tableExists($table)) {
				$sql = "DELETE FROM $table";

				if ($where != null) {
					
					$sql .= " WHERE $where";
				}
				if ($this->mysqli->query($sql)) {

					array_push($this->result, $this->mysqli->affected_rows);

				}else{
					array_push($this->result, $this->mysqli->error);
				}
			}
			else{
				return false;
			}
		}

		public function debug($data){
			echo "<pre>";
			print_r($data);
			echo "</pre>";
			exit();
		}
	}
	$obj = new MyDb();

?>