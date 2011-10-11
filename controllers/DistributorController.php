<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/Distributor.php');

Class DistributorController
{
	public function __construct()
	{
		$this->template = new Template;
		$this->template->template_dir = APP_PATH . DS . 'views' . DS . 'distributor' . DS;

		$this->template->title = 'Distributors';
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

		$this->template->distributor = Distributor::retrieve();
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
		$distributor = Distributor::retrieve(array('dist_id' => $id));
		if (count($distributor) == 1) 
		{
			$this->template->distributor = $distributor;
		} 
		else if (count($distributor) == 0) 
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

		if (isset($_SESSION['distributor']['errors'])) 
		{
			$this->template->errors = $_SESSION['distributor']['errors'];
			unset($_SESSION['distributor']['errors']);
		}
		if (isset($_SESSION['distributor'])) 
		{
			$this->template->distributor = $_SESSION['distributor'];
			unset($_SESSION['distributor']);
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
			header("Location: /Test/distributor/new");
			exit;
		}

		$data = array(
			'dist_name' => $_POST['dist_name'],
			'contact_number' => $_POST['contact_number'],
			'email' => $_POST['email'],
		);
		
		if(!Distributor::validates($data))
		{
			$_SESSION['distributor'] = $data;
			$_SESSION['distributor']['errors'] = Distributor::errors();
			header("Location: /Test/distributor/new");
			exit;
		}

		$id = Distributor::create($_POST);
		$_SESSION['distributor']['dist_id'] = $id;
		header("Location: /Test/distributor/{$id}");
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

		if(!$distributor = Distributor::retrieve(array('dist_id' => $id)))
		{
			header("Location: /Test/distributor/{$_SEESION['distributor']['dist_id']}");
			exit;
		}
		$this->template->distributor = $distributor;
		
		if(isset($_SESSION['distributor']['errors']))
		{
			$this->template->errors = $_SESSION['distributor']['errors'];
			unset($_SESSION['distributor']['errors']);
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
			header("Location: /Test/distributor/{$id}");
			exit;
		}
		
		if(!Distributor::validates($_POST))
		{
			$_SESSION['distributor']['errors'] = Distributor::errors();
			header("Location: /Test/distributor/{$id}/edit");
			exit;
		}
		
		Distributor::update($id, $_POST);
		header("Location: /Test/distributor/{$id}");
		exit;		
	}
}
