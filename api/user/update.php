<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/user.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $user = new User();

  $user->id = $data->id;
  $user->firstName = $data->firstName;
  $user->lastName = $data->lastName;
  $user->username = $data->username;
  $user->password = $data->password;
  $user->email = $data->email;
  $user->phone = $data->phone;
  $user->address = $data->address;

  return json_encode($user->update());
