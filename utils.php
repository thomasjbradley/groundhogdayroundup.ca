<?php

define('YEARS_DIR', __DIR__ . '/years');
define('YEAR_FILE_EXT', '.json');
define('YEAR_FILE', YEARS_DIR . '/%s' . YEAR_FILE_EXT);

function createNewGopherList () {
  $gophers = (object) array(
    'billy' => 'still-hibernating'
    , 'willie' => 'still-hibernating'
    , 'sam' => 'still-hibernating'
    , 'chuck' => 'still-hibernating'
    , 'phil' => 'still-hibernating'
    , 'lee' => 'still-hibernating'
  );

  return $gophers;
}

function getYear () {
  $year = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);

  if (empty($year))
    $year = date('Y');

  return $year;
}

function getYearData ($year) {
  $file = sprintf(YEAR_FILE, $year);

  if (file_exists($file)) {
    $gophers = json_decode(file_get_contents($file));
  } else {
    $gophers = createNewGopherList();
  }

  return $gophers;
}

function getAllYears () {
  $other_years = array();
  $di = new DirectoryIterator(YEARS_DIR);

  foreach ($di as $other_year) {
    if ($other_year->isFile())
      $other_years[] = str_replace(YEAR_FILE_EXT, '', $other_year->getFilename());
  }

  return $other_years;
}
