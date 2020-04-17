<?php 

	require_once('database_class.php');

	class Product extends Database
	{
		

		public function __construct(){
			$pdo = new Database;
			$con = $pdo->connect();
		}

		public function insertProduct($title,$price,$stock,$location,$category_id,$img1,$img2,$img3,$description,$u_id)
		{

			$pdo = new Database;
			$con = $pdo->connect();
			$date = date('Y-m-d');

			try {

			$sql = "INSERT INTO products(title,price,stock,location,category_id,image1,image2,image3,description,user_id,created_at)VALUES(:title,:price,:stock,:location,:category_id,:image1,:image2,:image3,:description,:u_id,:c_date)";
			$stmt = $con->prepare($sql);
			$stmt->execute([
				
							'title'=>$title,
							'price'=>$price,
							'stock'=>$stock,
							'location'=>$location,
							'category_id'=>$category_id,
							'image1'=>$img1,
							'image2'=>$img2,
							'image3'=>$img3,
							'description'=>$description,
							'u_id'=>$u_id,
							'c_date'=>$date

					]);
			echo "Product Added";
				
			} catch (Exception $e) {
				
				echo "Error";

			}	

		}

		public function displayProduct($id)
		{
		
			$pdo = new Database;
			$con = $pdo->connect();
			$sql = "SELECT * FROM products WHERE user_id = :id";
			$stmt = $con->prepare($sql);
			$stmt->execute([

						'id' => $id

					]);
			$products = $stmt->fetchAll();
			
			return $products;

		}

		public function displayAllProduct()
		{
		
			$pdo = new Database;
			$con = $pdo->connect();
			$sql = "SELECT * FROM products ORDER BY id DESC";
			$stmt = $con->prepare($sql);
			$stmt->execute();
			$products = $stmt->fetchAll();
			
			return $products;

		}

		public function editProduct($id){

			$pdo = new Database;
			$con = $pdo->connect();

			try {

				$sql = "SELECT * FROM products WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([
						'id'=> $id
				]);
				$products = $stmt->fetchAll();
				return $products; 
				
			} catch (Exception $e) {
				echo "Error";
			}

		}

		public function updateProduct($id,$title,$price,$stock,$location,$category_id){

			$pdo = new Database;
			$con = $pdo->connect();

			try {
				
				$sql = "UPDATE products SET title = :title , price = :price, stock = :stock, location = :location, category_id = :category_id WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([
						'location'=>$location,
						'stock'=>$stock,
						'title' => $title,
						'price' => $price,
						'id' => $id,
						'category_id'=>$category_id
				]);

				return true;

			} catch (Exception $e) {
					return false;
			}

		}

		public function deleteProduct($id){

			
			$pdo = new Database;
			$con = $pdo->connect();

			try {
				
				$sql = "DELETE FROM products WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->execute([

					'id' => $id,

				]);

				
			
			} catch (Exception $e) {
				
				echo "Error";			
			
			}			

		}

		public function productCategoryView($id)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			try 
			{

				$sql = "SELECT * FROM products WHERE category_id = :id";

				$stmt = $con->prepare($sql);
				$stmt->execute([

						'id' => $id

					]);

				$data = $stmt->fetchAll();
				return $data;
				
			} 
			catch (Exception $e) 
			{

				return false;
				
			}

		}

		public function productCount($id)
		{

			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT COUNT(*) AS totalproducts FROM products WHERE user_id = :id ";

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

		public function searchProduct($search)
		{
			$pdo = new Database;
			$con = $pdo->connect();

			$sql = "SELECT * FROM products WHERE title LIKE CONCAT('%',:search,'%') ";

			try 
			{
			
				$stmt = $con->prepare($sql);
				$stmt->execute([

						'search'=>$search

						]);

				$data = $stmt->fetchAll();
				return $data;

			} 
			catch (Exception $e) 
			{
				return false;
			}
		}

	}

 ?>