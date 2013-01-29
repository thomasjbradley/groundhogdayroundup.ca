<?php

require_once 'utils.php';

$url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_STRING);

if ($url == '/sitemap.xml') {
  require_once 'views/sitemap.xml.php';
} else {
  require_once 'views/index.html.php';
}
