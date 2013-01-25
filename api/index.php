<?php

require_once '../utils.php';

$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
$request = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  header('HTTP/1.1 405 Method Not Allowed');
  echo '{"error":"Gopher’s can’t be manipulated."}';
  exit;
}

if (!empty($request)) {
  $year = getYear();
  // echo json_encode(getGopherList($year), JSON_UNESCAPED_SLASHES);
  echo stripslashes(json_encode(getGopherList($year)));
} else {
  $years = getAllYears();
  $yearsJson = array();

  foreach ($years as $year) {
    $yearsJson[] = $host . $year;
  }

  // echo json_encode($yearsJson, JSON_UNESCAPED_SLASHES);
  echo stripslashes(json_encode($yearsJson));
}
