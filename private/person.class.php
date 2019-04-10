<?php

require_once 'model.class.php';

abstract class Person extends Model{

  public $firstName;
  public $lastName;
  public $username;
  public $password;

  public function set_first_name($firstName){
    $this->firstName = $firstName;
  }

  public function get_first_name(){
    return $this->firstName;
  }

  public function set_last_name($lastName){
    $this->lastName = $lastName;
  }

  public function get_last_name(){
    return $this->lastName;
  }

  public function set_username($username){
    $this->username = $username;
  }

  public function get_username(){
    return $this->username;
  }


  public function set_password($password){
    $this->password = $password;
  }

  public function get_password(){
    return $this->password;
  }

}
