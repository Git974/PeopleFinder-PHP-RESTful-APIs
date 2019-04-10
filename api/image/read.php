<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../private/image.class.php';

if (isset($_GET['id'])){
  $id = $_GET['id'];
  $image = Image::select_record($id);
  echo json_encode($image);
} else {
  $images = Image::select_all_record();
  echo json_encode($images);
}
