<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../private/admin.class.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $admin = Admin::select_record($id);
  echo json_encode($admin);
} else {
  $admins = Admin::select_all_record();
  echo json_encode($admins);
}
