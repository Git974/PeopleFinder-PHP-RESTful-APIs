<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/image.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $image = new image();

  $image->id = $data->id;

  if($image->delete()){
    echo json_encode(array('result' => true));
  } else {
    echo json_encode(array('result' => false));
  }
