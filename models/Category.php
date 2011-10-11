<?php

require_once(LIBRARY_PATH . DS . 'Database.php');

Class Category
{

	private static $errors;

	public static function validates(array &$data)
	{
		$errors = array();

		if(!preg_match("/^[a-zA-Z0-9 ]+$/", $data['category_name']))
		{
			$errors['category_name'] = 'Only alphanumerics allowed';
		}
		if(!isset($data['category_name']) || empty($data['category_name']))
		{
			$errors['category_name'] = 'Please enter a category name';
		}
		if(isset($errors['category_name']))
		{
			unset($data['category_name']);
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
		
		$sql = 'SELECT * FROM category';
		$values = array();
		
		if (count($data))
		{
      		$count = 0;
			
      		foreach ($data as $key => $value)
   		   	{
          		if ((++$count) == 1)
        		{
          			$sql .= " WHERE {$key} = ?";
          			$values[] = $value;
        		}
        		else
        		{
          			$sql .= " AND {$key} = ?";
          			$values[] = $value;
       			}
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
		$sql = 'INSERT INTO category (category_name)
					VALUES (?)';
		$values = array(
			$data['category_name']
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
		$sql = 'UPDATE category SET category_name = ? WHERE category_id = ?';
		$values = array(
			$data['category_name'],
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
