<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/admin.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $admin = new admin();

  $admin->id = $data->id;

  if($admin->delete()){
    echo json_encode(array('result' => true));
  } else {
    echo json_encode(array('result' => false));
  }
