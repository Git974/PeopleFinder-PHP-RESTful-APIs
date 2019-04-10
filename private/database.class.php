<?php

require_once 'config.php';

class Database {

  private $connection;
  private $query;
  private static $instance = null;

  private function __construct(){
    $this->open_connection();
  }

  public static function get_database(){
    if(Database::$instance === null){
      Database::$instance = new Database();
      return Database::$instance;
    } else {
      return Database::$instance;
    }
  }

  private function open_connection(){
    $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // die($this->connection);
    if(!$this->connection){
      die('Database Connection Failed!: ' . mysqli_error($this->connection));
    }
  }

  public function close_connection(){
    if(isset($this->connection)){
      mysqli_close($this->connection);
      unset($this->connection);
    }
  }

  public function execute_query($query){
    if($query){
      $this->query = $query;
      // die($this->query);
      // die($this->connection);
      $result = mysqli_query($this->connection, $this->query);
      $this->confirm_result($result);
      return $result;
    }
  }

  private function confirm_result($result) {
		if (!$result) {
	    die("Database query failed: " . mysqli_error($this->connection) . "<br /><br />");
		}
	}

  public function fetch_assoc($result_set) {
    return mysqli_fetch_assoc($result_set);
  }

  public function escape_value($value) {
    $value = mysqli_real_escape_string($this->connection, $value);
    return $value;
  }

}

$database = Database::get_database();
