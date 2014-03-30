<?php

require_once '../utils.php';

$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
$request = preg_replace('@/*$@', '', str_replace('/api', '', filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING)));

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  header('HTTP/1.1 405 Method Not Allowed');
  echo '{"error":"Gophers can’t be manipulated."}';
  exit;
}

switch ($request) {
  case '':
    $years = getAllYears();
    $response = array(
      'gophers' => $host . 'gophers'
      , 'years' => array()
    );

    foreach ($years as $year) {
      $response['years'][] = $host . $year;
    }

    // echo json_encode($yearsJson, JSON_UNESCAPED_SLASHES);
    echo stripslashes(json_encode($response));
    break;

  case '/gophers':
    echo file_get_contents(GOPHERS_PATH);
    break;

  default:
    $year = getYear();
    // echo json_encode(getGopherList($year), JSON_UNESCAPED_SLASHES);
    echo stripslashes(json_encode(getGopherData($year)));
}
