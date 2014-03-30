<?php

define('YEARS_DIR', __DIR__ . '/years');
define('YEAR_FILE_EXT', '.json');
define('YEAR_FILE', YEARS_DIR . '/%s' . YEAR_FILE_EXT);
define('DEFAULT_GOPHER_LIST', YEARS_DIR . '/default.json');
define('GOPHERS_PATH', __DIR__ . '/gophers.json');

/**
 * Gets the current country: ca or us
 * @return string
 */
function getCountry () {
  return (stripos($_SERVER['HTTP_HOST'], '.ca') !== false) ? 'ca' : 'us';
}

/**
 * Reads the URL or defaults to this year
 * @return string
 */
function getYear () {
  $year = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);

  if (empty($year))
    $year = date('Y');

  return $year;
}

/**
 * Gets all the years that have data available
 * @return array
 */
function getAllYears () {
  $other_years = array();
  $di = new DirectoryIterator(YEARS_DIR);
  $ignore = array(
    basename(DEFAULT_GOPHER_LIST)
  );

  foreach ($di as $other_year) {
    if ($other_year->isFile() && !in_array($other_year->getFilename(), $ignore))
      $other_years[] = str_replace(YEAR_FILE_EXT, '', $other_year->getFilename());
  }

  natsort($other_years);

  return $other_years;
}

/**
 * Gets the list of gophers and their name, location bits
 * @return object
 */
function getGophers () {
  return json_decode(file_get_contents(GOPHERS_PATH));
}

/**
 * Reads in the default gopher list construct
 * @return object
 */
function createNewGopherData () {
  return json_decode(file_get_contents(DEFAULT_GOPHER_LIST));
}

/**
 * Gets a single gopher list for a specific year
 * @param string $year
 * @return object
 */
function getGopherData ($year) {
  $file = sprintf(YEAR_FILE, $year);

  if (file_exists($file)) {
    $gophers = json_decode(file_get_contents($file));
  } else {
    $gophers = createNewGopherData();
  }

  return $gophers;
}
