<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/missingperson.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $missingPerson = new MissingPerson();

  $missingPerson->id = $data->id;

  if($missingPerson->delete()){
    echo json_encode(array('result' => true));
  } else {
    echo json_encode(array('result' => false));
  }
