<?php

require_once 'person.class.php';

class User extends Person {

  public $email;
  public $phone;
  public $address;

  protected static $tableName = "tbl_user";

  public function set_email($email) {
    $this->email = $email;
  }

  public function get_email() {
    return $this->email;
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
