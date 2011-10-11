<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/Processor.php');
require_once(APP_PATH . DS . 'models/Product.php');
require_once(APP_PATH . DS . 'models/Brand.php');
require_once(APP_PATH . DS . 'models/Category.php');

Class ProcessorsController
{
	public function __construct()
	{
		$this->template = new Template;
		$this->template->template_dir = APP_PATH . DS . 'views' . DS . 'products' . DS . 'processors' . DS;

		$this->template->title = 'Processors';
	}

	public function index()
	{
   	// must be logged in and the admin to access this page
    	if (!isset($_SESSION['user']))
    	{
      		header("Location: /Test/session/new");
   	   		exit;
   		}
    	if ($_SESSION['user']['account_type_id'] > 1)
    	{
    	  	header("Location: /Test/users/{$_SESSION['user']['user_id']}");
     		exit;
    	}

		$this->template->processors = Processor::retrieve();
   		$this->template->display('index.php');
	}

	public function show($id) 
	{
    	// must be logged in to access this page
		if (!isset($_SESSION['user']))
		{
			header("Location: /Test/session/new");
			exit;
		}

		if ($_SESSION['user']['account_type_id'] > 1 && $_SESSION['user']['user_id'] != $id) 
		{
			// this user cannot edit distributors
			header("Location: /Test/users/{$_SESSION['user']['user_id']}");
			exit;
    	}
	
		$this->template->id = $id;

		// get the user with id = $id
		$processors = Product::retrieve(array('product_id' => $id));
		if (count($products) == 1) 
		{
			$this->template->processors = $processors;
		} 
		else if (count($processors) == 0) 
		{
			$this->template->id = $id;
		}

		$this->template->display('show.php');
	}

	public function add() 
 	{
		// must be logged in and the admin to access this page
		if (!isset($_SESSION['user'])) 
		{
			header("Location: /Test/session/new");
			exit;
		}
		if ($_SESSION['user']['account_type_id'] > 1) 
		{
			header("Location: /Test/users/{$_SESSION['user']['user_id']}");
			exit;
		}
		
		//currently no validation
		
		//I don't understand why this isn't working.. 
		//$this->template->categories = Category::retrieve();
		
		$this->template->brands = Brand::retrieve();
		$this->template->display('add.php');
	}

	public function create()
	{
		if (!isset($_SESSION['user'])) 
		{
      		header("Location: /Test/session/new");
      		exit;
    	}
		
    	if ($_SESSION['user']['account_type_id'] > 1) 
    	{
      		header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      		exit;
    	}

		if (!isset($_POST) || empty($_POST))
		{
			header("Location: /Test/products/processors/new");
			exit;
		}

		$productData = array(
			'category_id' => 1,
			'brand_id' => $_POST['brand_id'],
			'stock' => $_POST['stock'],
			'price' => $_POST['price'],
			'warranty' => $_POST['warranty'],
			'comments' => $_POST['comments'],			
		);
		/*
		if(!Product::validates($productData) && !Processor::validates($processorData))
		{
			$_SESSION['processors'] = $data;
			$_SESSION['products']['errors'] = Product::errors();
			header("Location: /Test/products/processors/new");
			exit;
		}
		*/
		$id = Product::create($productData);
		
		$processorData = array(
			'product_id' => $id,
			'proc_name' => $_POST['proc_name'],
			'proc_model' => $_POST['proc_model'],
			'proc_speed' => $_POST['proc_speed'] 
		);
		/*
		if(!Processor::validates($processortData))
		{
			$_SESSION['processors'] = $data;
			$_SESSION['processors']['errors'] = Processor::errors();
			header("Location: /Test/products/processors/new");
			exit;
		}
		*/

		//Processor::create($processorData);
		
		$_SESSION['processors']['product_id'] = $id;
		header("Location: /Test/products/processors/{$id}");
		exit;
	}
	
	/*
	public function edit($id)
	{
		if(!isset($_SESSION['user']))
		{
			header("Location: /Test/session/new");
			exit;
		}
		if($_SESSION['user']['account_type_id'] > 1)
		{
			header("Location: /Test/users/{$_SESSION['user']['user_id']}");
			exit;
		}

		if(!$categories = Category::retrieve(array('category_id' => $id)))
		{
			header("Location: /Test/categories/{$_SEESION['categories']['category_id']}");
			exit;
		}
		$this->template->categories = $categories;
		
		if(isset($_SESSION['categories']['errors']))
		{
			$this->template->errors = $_SESSION['categories']['errors'];
			unset($_SESSION['categories']['errors']);
		}
		
		$this->template->display('edit.php');
	}
	
	public function update($id)
	{
		if(!isset($_SESSION['user']))
		{
			header("Location: /Test/session/new");
			exit;
		}
		if($_SESSION['user']['account_type_id'] > 1)
		{
			header("Location: /Test/users/{$_SESSION['user']['user_id']}");
			exit;
		}
		
		if(!isset($_POST) || empty($_POST))
		{
			header("Location: /Test/categories/{$id}");
			exit;
		}
		
		if(!Category::validates($_POST))
		{
			$_SESSION['categories']['errors'] = Category::errors();
			header("Location: /Test/categories/{$id}/edit");
			exit;
		}
		
		Category::update($id, $_POST);
		header("Location: /Test/categories/{$id}");
		exit;		
	}*/
}
