<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../private/user.class.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $user = User::select_record($id);
  echo json_encode($user);
} else {
  $users = User::select_all_record();
  echo json_encode($users);
}
