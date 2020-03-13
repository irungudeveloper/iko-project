<?php 

	require_once('database_class.php');

	/**
	 * 
	 */
	class User extends Database
	{
		
		private $pdo;
		private $con;

		function __construct()
		{
			$this->pdo = new Database;
			$this->con = $this->pdo->connect();

			return $this->con;
		}

		public function createUser($fname,$lname,$image,$email,$password,$type,$date)
		{
			$con = $this->con;

			$sql = "INSERT INTO users(fname,lname,image,email,password,type_id,created_at) VALUES(:fname,:lname,:image,:email,:password,:type,:create_date)";

			try 
			{
			 	
			 	$stmt = $con->prepare($sql);
			 	$stmt->execute([

			 			'fname'=>$fname,
			 			'lname'=>$lname,
			 			'image'=>$image,
			 			'email'=>$email,
			 			'password'=>$password,
			 			'type'=>$type,
			 			'create_date'=>$date

			 		]);

			 	return true;


			}
			 catch (Exception $e) 
			{

				return false;
			 	
			} 
		}

		public function displayUser($id)
		{
			$con = $this->con;

			$sql = "SELECT * FROM users WHERE id=:id";

			try 
			{
				$stmt = $con->prepare($sql);
				$stmt->execute(['id'=>$id]);

				$data = $stmt->fetchAll();
				return $data;

			} 
			catch (Exception $e) 
			{
				return false;
			}
		}

		public function getUserType()
		{

			$sql = "SELECT * FROM user_type";

			try 
			{

				$con = $this->con;

				$stmt = $con->prepare($sql);
				$stmt->execute();

				$data = $stmt->fetchAll();

				return $data;
				
			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function getUserInfo($email)
		{
			$sql = "SELECT * FROM users WHERE email = :email";

			try 
			{
				$con = $this->con;
				
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'email' => $email

					]);

				$data = $stmt->fetchAll();
				return $data;

			} 
			catch (Exception $e) 
			{
				$data = "Email Not Found";
				return $data;
			}
		}

		public function userLogin($email,$password)
		{

			$data = $this->getUserInfo($email);

			foreach ($data as $dbvalue) 
			{
			
				if(password_verify($password, $dbvalue->password))
				{
					return $dbvalue->email;
				}else
				{
					$response = "Incorrect Password";
					return $response;
				}

			}

		}

	}

 ?>