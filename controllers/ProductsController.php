<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/Product.php');

Class ProductsController
{
	public function __construct()
	{
		$this->template = new Template;
		$this->template->template_dir = APP_PATH . DS . 'views' . DS . 'products' . DS;

		$this->template->title = 'Products';
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

   		$this->template->display('index.php');
	}

	/*
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
		$products = Product::retrieve(array('product_id' => $id));
		if (count($products) == 1) 
		{
			$this->template->products = $products;
		} 
		else if (count($products) == 0) 
		{
			$this->template->id = $id;
		}

		$this->template->display('show.php');
	}
	*/
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

		if (isset($_SESSION['products']['errors'])) 
		{
			$this->template->errors = $_SESSION['products']['errors'];
			unset($_SESSION['products']['errors']);
		}
		if (isset($_SESSION['products'])) 
		{
			$this->template->products = $_SESSION['products'];
			unset($_SESSION['products']);
		}

		$this->template->display('add.php');
	}
/*
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
			header("Location: /Test/categories/new");
			exit;
		}

		$data = array(
			'category_name' => $_POST['category_name'],
		);
		
		if(!Category::validates($data))
		{
			$_SESSION['categories'] = $data;
			$_SESSION['categories']['errors'] = Category::errors();
			header("Location: /Test/categories/new");
			exit;
		}

		$id = Category::create($_POST);
		$_SESSION['categories']['category_id'] = $id;
		header("Location: /Test/categories/{$id}");
		exit;
	}
	
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
