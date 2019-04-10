<?php

require_once 'database.class.php';

class Model {

  public $id;
  protected static $tableName = "";



  public function count(){
    global $database;

    $selectQuery = "SELECT count(id) AS count FROM " . static::$tableName;

    $result = $database->query($selectQuery);
    $result = $database->fetchAssoc($result);

    return $result['count'];
  }

  public static function select_all_record() {
    $selectQuery = "SELECT * FROM " . static::$tableName;  //late binding
    // die($selectQuery);
    $objects = self::execute_query($selectQuery);
    return $objects;
  }

  public static function select_record($id) {
    global $database;

    $Id = $database->escape_value($id);

    $selectQuery = "SELECT * FROM " . static::$tableName . " ";
    $selectQuery .= "WHERE id = {$Id} ";
    $selectQuery .= "LIMIT 1";

    // die($selectQuery);
    $result = self::execute_query($selectQuery);
    $object = array_shift($result);
    return $object;
  }

  public function insert(){
    global $database;

    $insertQuery = "INSERT INTO " . static::$tableName . " ( ";

    $data = get_object_vars($this);

    foreach($data as $attribute => $value) {
      if($attribute != 'id') {
        $insertQuery .= "$attribute, ";
      }
    }

    $insertQuery = rtrim($insertQuery, ", ");
    $insertQuery .= " ) VALUES ( ";

    foreach($data as $attribute => $value) {
      if($attribute != 'id') {
        $insertQuery .= "'{$database->escape_value($value)}', ";
      }
    }

    $insertQuery = rtrim($insertQuery, ", ");
    $insertQuery.= " ) ";

    // die(print_r($data));
    // die($insertQuery);

    return self::execute_query($insertQuery);
  }

  public function update(){
    global $database;

    $updateQuery = "UPDATE " . static::$tableName . "   SET  ";

    $data = get_object_vars($this);
    foreach($data as $attribute => $value){
      if($attribute != 'id'){
        $updateQuery .= "$attribute = '{$database->escape_value($value)}', ";
      }
    }

    $updateQuery = rtrim($updateQuery, ", ");
    $updateQuery .= " ";
    $updateQuery .= "WHERE id = '{$data['id']}'   ";
    $updateQuery .= "LIMIT 1";

    // die($updateQuery);

    return self::execute_query($updateQuery);
  }

  public function delete(){
    global $database;

    $database->escape_value($this->id);

    $deleteQuery = "DELETE FROM " . static::$tableName . " ";
    $deleteQuery .= "WHERE id={$this->id} ";
    $deleteQuery .= "LIMIT 1";

    // die($deleteQuery);
    return self::execute_query($deleteQuery);
  }

  private static function execute_query($sql) {
    global $database;

    if($database == null){
      die("database empty");
    }

    $result = $database->execute_query($sql);
    // die($result);
    $objectArray = [];

    if($result === true){
      // die("Deleted");
      return true;
    }
    while ($record = $database->fetch_assoc($result)) {
      $objectArray[] = self::instantiate($record);
    }

    return $objectArray;
  }

  private static function instantiate($record){
    $recordObject = new static;
    // die(print_r($record));


    foreach ($record as $attribute => $value) {
      if($recordObject->has_attribute($attribute)){
        $recordObject->$attribute = $value;
      }
    }
    // die(print_r($recordObject));

    return $recordObject;
  }


  private function has_attribute($attribute) {
    $objectVars = get_object_vars($this);

    // die(print_r($objectVars));
    return array_key_exists($attribute, $objectVars);
  }


}

?>
