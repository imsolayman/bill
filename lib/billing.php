<?php  
	include 'lib/Database.php'; 
?>
<?php
	class Bill{ 
		private $db;
		
		public function __construct(){
			$this->db = new Database(); 
		}
		
		public $id;
		public $name;
		public $share;
		public $paid;
		public $due;
		public $month;
		public $year;
		
		public function createBill($data){
			$name = $data['name'];
			$share = $data['share'];
			$paid = $data['paid'];
			$due = $data['due'];
			$month = $data['month'];
			$year = $data['year'];
		
		
			if($name == "" OR $share == "" OR $paid == "" OR $due == "" OR $month == "" OR $year == ""){
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Filed must not be empty</div>";
				return $msg;
			}
			
			$sql = "INSERT INTO mf_data (name, share, paid, due, month, year) VALUES(:name, :share, :paid, :due, :month, :year)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name', $name);
			$query->bindValue(':share', $share);
			$query->bindValue(':paid', $paid);
			$query->bindValue(':due', $due);
			$query->bindValue(':month', $month);
			$query->bindValue(':year', $year);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>Success ! </strong> Thanks, new data has been created</div>";
				return $msg; 
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> There has been problem inserting data</div>";
				return $msg;
			}
	
		}
		public function billingData(){
			$currentMonth = date('F');
			$currentYear = date('Y');
			$sql = "SELECT * FROM mf_data WHERE month = '$currentMonth' AND year = '$currentYear' ORDER BY id ASC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result; 
		}
		public function filterData($data){
			//var_dump($data);
			$month  = $data['month-select'];
			$year  = $data['year-select'];
			
			 $sql = "SELECT * FROM mf_data WHERE month = '$month' and year = '$year' ";
			
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			return $result; 
			
		}
		public function getUserById($id){
			$sql = "SELECT * FROM mf_data WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result; 
		}
		public function updateBill($id, $data){
			$name = $data['name'];
			$share = $data['share'];
			$paid = $data['paid'];
			$due = $data['due'];
			$month = $data['month'];
			$year = $data['year'];
		
		
			if($name == "" OR $share == "" OR $paid == "" OR $due == ""){
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Filed must not be empty</div>";
				return $msg;
			}
			
			$sql = "UPDATE mf_data SET 
						name = :name,
						share = :share,
						paid = :paid,
						due = :due,
						month = :month,
						year = :year
					WHERE id = :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':name', $name);
			$query->bindValue(':share', $share);
			$query->bindValue(':paid', $paid);
			$query->bindValue(':due', $due);
			$query->bindValue(':month', $month);
			$query->bindValue(':year', $year);
			$query->bindValue(':id', $id);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>Success ! </strong> User data update successfully</div>";
				return $msg; 
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> User data not updated</div>";
				return $msg;
			}
			
		}
		public function deleteBill($id, $data){
			
			$sql = "DELETE from mf_data WHERE id = :id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$result = $query->execute();
			if($result){
				$msg = "<div class='alert alert-success'><strong>Success ! </strong> User deleted update successfully</div>";
				return $msg; 
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> User data not deleted</div>";
				return $msg;
			}
			
		}
	}
?>