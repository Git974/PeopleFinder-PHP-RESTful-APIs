<?php

require_once 'model.class.php';

class MissingPerson extends Model{

  public $firstName;
  public $lastName;
  public $age;
  public $cnic;
  public $phone;
  public $address;

  protected static $tableName = 'tbl_missing_person';

  public function set_first_name($firstName) {
    $this->firstName = $firstName;
  }

  public function get_first_name() {
    return $this->firstName;
  }

  public function set_last_name($lastName) {
    $this->lastName = $lastName;
  }

  public function get_last_name() {
    return $this->lastName;
  }

  public function set_age($age) {
    $this->age = $age;
  }

  public function get_age() {
    return $this->age;
  }


  public function set_cnic($cnic) {
    $this->cnic = $cnic;
  }

  public function get_cnic() {
    return $this->cnic;
  }

  public function set_phone($phone) {
    $this->phone = $phone;
  }

  public function get_phone() {
    return $this->phone;
  }

  public function set_address($address) {
    $this->address = $address;
  }

  public function get_address() {
    return $this->address;
  }

}
