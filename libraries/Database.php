<?php

class Database {

  private static $db_host       = 'localhost';
  private static $db_name       = 'digimall';
  private static $db_username   = 'digimall';
  private static $db_password   = 'digimall';
  private static $instance;
  public $dsn;
  public $pdo;

  private function __construct() {
    $this->dsn = 'mysql:host=' . self::$db_host . ';dbname=' . self::$db_name;
    try {
      $this->pdo = new PDO($this->dsn, self::$db_username, self::$db_password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

}
