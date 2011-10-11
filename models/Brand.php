<?php

require_once(LIBRARY_PATH . DS . 'Database.php');

Class Brand
{

	private static $errors;

	public static function validates(array &$data)
	{
		$errors = array();

		if(!preg_match("/^[a-zA-Z0-9 ]+$/", $data['brand_name']))
		{
			$errors['brand_name'] = 'Only alphanumerics allowed';
		}
		if(!isset($data['brand_name']) || empty($data['brand_name']))
		{
			$errors['brand_name'] = 'Please enter a distributor name';
		}
		if(isset($errors['brand_name']))
		{
			unset($data['brand_name']);
		}
		
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
		
		$sql = 'SELECT * FROM brand, distributor WHERE brand.dist_id = distributor.dist_id';
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
		$sql = 'INSERT INTO brand (brand_name, dist_id)
					VALUES (?, ?)';
		$values = array(
			$data['brand_name'],
			$data['dist_id']
		);
		
		try
		{
			$database = Database::getInstance();

			$statement = $database->pdo->prepare($sql);
			$return = $statement->execute($values);

			if ($return)
			{
				$id = $database->pdo->lastInsertID();
			}

			$database->pdo = null;
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
			exit;
		}

		if ($return)
		{
			return $id;
		}

		return false;
	}
	
	public static function update($id, array $data)
	{
		$sql = 'UPDATE brand SET brand_name = ?, dist_id = ? WHERE brand_id = ?';
		$values = array(
			$data['brand_name'],
			$data['dist_id'],
			$id
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
