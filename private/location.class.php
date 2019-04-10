<?php

require_once 'model.class.php';

class Location extends Model{

  private $latitude;
  private $longitude;

  public function set_latitude($latitude){
    $this->latitude = $latitude;
  }

  public function get_latitude($latitude){
    return $this->latitude;
  }

  public function set_longitude($longitude){
    $this->longitude = $longitude;
  }

  public function get_longitude($longitude){
    return $this->longitude;
  }

}
