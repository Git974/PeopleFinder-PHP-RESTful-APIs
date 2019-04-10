<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../private/missingperson.class.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $missingPerson = MissingPerson::select_record($id);
  echo json_encode($missingPerson);
} else {
  $missingPersons = MissingPerson::select_all_record();
  echo json_encode($missingPersons);
}
