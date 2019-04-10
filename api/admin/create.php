<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/admin.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $admin = new Admin();

  $admin->firstName = $data->firstName;
  $admin->lastName = $data->lastName;
  $admin->username = $data->username;
  $admin->password = $data->password;

  return json_encode($admin->insert());
