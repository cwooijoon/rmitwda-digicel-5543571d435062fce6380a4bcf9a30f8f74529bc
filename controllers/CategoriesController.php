<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/Category.php');

Class CategoriesController
{
	public function __construct()
	{
		$this->template = new Template;
		$this->template->template_dir = APP_PATH . DS . 'views' . DS . 'categories' . DS;

		$this->template->title = 'Categories';
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

		$this->template->categories = Category::retrieve();
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
		$categories = Category::retrieve(array('category_id' => $id));
		if (count($categories) == 1) 
		{
			$this->template->categories = $categories;
		} 
		else if (count($categories) == 0) 
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

		if (isset($_SESSION['categories']['errors'])) 
		{
			$this->template->errors = $_SESSION['categories']['errors'];
			unset($_SESSION['categories']['errors']);
		}
		if (isset($_SESSION['categories'])) 
		{
			$this->template->categories = $_SESSION['categories'];
			unset($_SESSION['categories']);
		}

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
	}
}
