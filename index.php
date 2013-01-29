<?php

require_once 'utils.php';

$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING);

switch ($url) {
  case '/sitemap.xml':
    require_once 'views/sitemap.xml.php';
    break;
  case '/robots.txt':
    require_once 'views/robots.txt.php';
    break;
  default:
    require_once 'views/index.html.php';
}
