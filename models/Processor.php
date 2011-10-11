<?php

require_once(LIBRARY_PATH . DS . 'Database.php');

Class Processor
{

	private static $errors;

	public static function validates(array &$data)
	{
		$errors = array();

		//Currently none

		self::$errors =$errors;
		
		if(count($errors))
		{
			return false;
		}

		return true;
	}

	public static function errors()
	{
		return self::$errors;
	}

	public static function retrieve(array $data = array())
	{
		
		$sql = 'SELECT * 
				FROM product p, processor pr
					WHERE p.product_id = pr.product_id';
						
		$values = array();
		
		if (count($data))
		{
      		foreach ($data as $key => $value)
   		   	{

          		$sql .= " AND {$key} = ?";
          		$values[] = $value;

     	 	}	
   		 }
		
  	 	try
  	 	{
      		$database = Database::getInstance();

	  	 	$statement = $database->pdo->prepare($sql);

   	   		$statement->execute($values);
     		// result is FALSE if no rows found
      		$result = $statement->fetchAll(PDO::FETCH_OBJ);

      		$database->pdo = null;
    	}
    	catch (PDOException $e)
    	{
     		echo $e->getMessage();
      		exit;
    	}

    	if (count($result) > 1)
    	{
      		return $result;
    	}
    	else if (count($result) == 1)
    	{
      		return $result[0];
    	}
    	else
    	{
      		return NULL;
    	}
	}


	public static function create(array $data)
	{
		$sql = 'INSERT INTO processor (product_id, proc_name, proc_model, proc_speed)
					VALUES (?, ?, ?, ?)';
		$values = array(
			$data['product_id'],
			$data['proc_name'],
			$data['proc_model'],
			$data['proc_speed']
		);
		
		try
		{
			$database = Database::getInstance();

			$statement = $database->pdo->prepare($sql);
			$return = $statement->execute($values);

			$database->pdo = null;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
			exit;
		}
	}
	
	public static function update($id, array $data)
	{
		$sql = 'UPDATE product 
					SET category_id = ?, brand_id = ?, stock = ?, price = ?, warranty = ?, comments = ? 
						WHERE product_id = ?';
		$values = array(
			$data['category_id'],
			$data['brand_id'],
			$data['stock'],
			$data['price'],
			$data['warranty'],
			$data['comments']
		);
		
		try
		{
			$database = Database::getInstance();
			
			$statement = $database->pdo->prepare($sql);
			$return = $statement->execute($values);
			
			$database->pdo = null;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
			exit;
		}
		
		return $return;
	}
}
