<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../private/missingperson.class.php';

  $data = json_decode(file_get_contents("php://input"));

  $missingPerson = new missingPerson();

  $missingPerson->id = $data->id;
  $missingPerson->firstName = $data->firstName;
  $missingPerson->lastName = $data->lastName;
  $missingPerson->age = $data->age;
  $missingPerson->cnic = $data->cnic;
  $missingPerson->phone = $data->phone;
  $missingPerson->address = $data->address;
  $missingPerson->image = $data->image;

  return json_encode($missingPerson->update());
