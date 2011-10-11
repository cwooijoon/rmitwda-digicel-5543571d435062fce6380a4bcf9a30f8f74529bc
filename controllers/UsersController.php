<?php
session_start();

require_once(LIBRARY_PATH . DS . 'Template.php');
require_once(APP_PATH . DS . 'models/User.php');

class UsersController {

  public function __construct() {
    $this->template = new Template;
    $this->template->template_dir = APP_PATH . DS . 'views' . DS . 'users' . DS;

    $this->template->title = 'Users';
  }

  public function index() {
    // must be logged in and the admin to access this page
    if (!isset($_SESSION['user'])) {
      header("Location: /Test/session/new");
      exit;
    }
    if ($_SESSION['user']['account_type_id'] > 1) {
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }

    $this->template->users = User::retrieve();
    $this->template->display('index.php');
  }

  public function show($id) {
    // must be logged in to access this page
    if (!isset($_SESSION['user'])) {
      header("Location: /Test/session/new");
      exit;
    }
    if ($_SESSION['user']['account_type_id'] > 1 && $_SESSION['user']['user_id'] != $id) {
      // this user is trying to access a different user
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }

    $this->template->id = $id;

    // get the user with id = $id
    $user = User::retrieve(array('user_id' => $id));
    if (count($user) == 1) {
      $this->template->user = $user;
    } else if (count($user) == 0) {
      $this->template->id = $id;
    }

    $this->template->display('show.php');
  }

  public function add() {
    // must be logged in and the admin to access this page
    if (!isset($_SESSION['user'])) {
      header("Location: /Test/session/new");
      exit;
    }
    if ($_SESSION['user']['role_id'] > 1) {
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }

    if (isset($_SESSION['user']['errors'])) {
      $this->template->errors = $_SESSION['user']['errors'];
      unset($_SESSION['user']['errors']);
    }
    if (isset($_SESSION['user'])) {
      $this->template->user = $_SESSION['user'];
      unset($_SESSION['user']);
    }
    $this->template->display('add.php');
  }

  public function create() {
    // must have some POSTed data
    // could check for referer here
    if (!isset($_POST) || empty($_POST)) {
      header("Location: /Test/users/new");
      exit;
    }
    // TODO need to validate data
    $data = array(
      'name' => $_POST['name'],
      'email' => $_POST['email'],
      'username' => $_POST['username'],
      'password' => $_POST['password'],
    );
    if (!User::validates($data)) {
      // store errors in session and redirect
      $_SESSION['user'] = $data;
      $_SESSION['user']['errors'] = User::errors();
      header("Location: /Test/users/new");
      exit;
    }

    // create a new user
    // log the user in
    // redirect to user's home page
    $id = User::create($_POST);
    $_SESSION['user']['user_id'] = $id;
    $_SESSION['user']['account_type_id'] = 2; // assumes all newly created users are not admins
    header("Location: /Test/users/{$id}");
    exit;
  }

  public function edit($id) {
    // must be logged in to access this page
    if (!isset($_SESSION['user'])) {
      header("Location: /Test/session/new");
      exit;
    }
    if ($_SESSION['user']['account_type_id'] > 1 && $_SESSION['user']['user_id'] != $id) {
      // this user is trying to access a different user
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }

    if (!$user = User::retrieve(array('user_id' => $id))) {
      // something has gone wrong with db request
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }
    $this->template->user = $user;

    if (isset($_SESSION['user']['errors'])) {
      $this->template->errors = $_SESSION['user']['errors'];
      unset($_SESSION['user']['errors']);
    }

    $this->template->display('edit.php');
  }

  public function update($id) {
    // must be logged in to access this page
    if (!isset($_SESSION['user'])) {
      header("Location: /Test/session/new");
      exit;
    }
    if ($_SESSION['user']['account_type_id'] > 1 && $_SESSION['user']['user_id'] != $id) {
      // this user is trying to access a different user
      header("Location: /Test/users/{$_SESSION['user']['user_id']}");
      exit;
    }

    // must have some POSTed data
    // could check for referer here
    if (!isset($_POST) || empty($_POST)) {
      header("Location: /Test/users/{$id}");
      exit;
    }
    // TODO need to validate data
    if (!User::validates($_POST)) {
      // store errors in session and redirect
      $_SESSION['user']['errors'] = User::errors();
      header("Location: /Test/users/{$id}/edit");
      exit;
    }

    // update user
    // redirect to user's show page
    User::update($id, $_POST);
    header("Location: /Test/users/{$id}");
    exit;
  }


}
