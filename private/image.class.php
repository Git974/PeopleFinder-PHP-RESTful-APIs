<?php

require_once 'model.class.php';

class Image extends Model {

  public $path;
  public $creationDate;

  protected static $tableName = 'tbl_image';

  public function set_path($path){
    $this->path = $path;
  }
  public function get_path($path){
    return $this->path;
  }

  public function set_creationDate($creationDate){
    $this->creationDate = $creationDate;
  }
  public function get_creationDate($creationDate){
    return $this->creationDate;
  }

}
