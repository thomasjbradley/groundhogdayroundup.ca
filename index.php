<?php

$year = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_NUMBER_INT);

if (empty($year))
  $year = date('Y');

$domain = (stripos($_SERVER['HTTP_HOST'], '.ca') !== false) ? 'ca' : 'us';
$folder = 'years/';
$file = $folder . $year . '.json';

$text = array(
  'shadow' => 'Saw his shadow—more winter is coming.'
  , 'no-shadow' => 'Didn’t see his shadow—spring’s on the way.'
  , '' => 'Hasn’t woken up yet.'
);

if (file_exists($file)) {
  $gophers = json_decode(file_get_contents($file));
} else {
  $year = date('Y');
  $gophers = (object) array(
    'billy' => ''
    , 'willie' => ''
    , 'sam' => ''
    , 'chuck' => ''
    , 'phil' => ''
    , 'lee' => ''
  );
}

$other_years = array();
$di = new DirectoryIterator($folder);

foreach ($di as $other_year) {
  if ($other_year->isFile())
    $other_years[] = str_replace('.json', '', $other_year->getFilename());
}

$themeCss = basename(glob(__DIR__ . '/theme/css/theme*.css')[0]);

?><!DOCTYPE html>
<html lang="en-ca">
<head>
  <meta charset="utf-8">
  <title>Groundhog Day Roundup—Feb. 2nd, <?= $year ?>—Canada &amp; United States</title>
  <meta name="keywords" content="groundhog,day,shadow,roundup,canada,united,states,balzac,billie,wiarton,willie,shubenacadie,sam,staten,island,chuck,punxsutawney,phil,general,beauregard,lee">
  <meta name="description" content="A roundup of the Groundhog Day results from across Canada and the United States">
  <meta name="author" content="Thomas J Bradley">
  <meta name="copyright" content="Thomas J Bradley">
  <link href="/theme/css/<?= $themeCss ?>" rel="stylesheet">
  <meta name="handheldfriendly" content="true">
  <meta name="mobileoptimized" content="240">
  <meta name="viewport" content="width=device-width,initial-scale=1,target-densitydpi=device-dpi">
</head>
<body>

<h1 class="logo"><a href="/" class="logo-link"><img class="logo-img" src="/theme/img/logo.svg" alt="Groundhog Day Roundup"></a></h1>

<p class="lede">Feb. 2nd, <?= $year ?></p>

<div class="gopher-group">
<?php
  if ($domain == 'ca') {
    require_once 'theme/inc/ca.php';
  } else {
    require_once 'theme/inc/us.php';
  }
?>
</div>

<div class="gopher-group">
<?php
  if ($domain == 'ca') {
    require_once 'theme/inc/us.php';
  } else {
    require_once 'theme/inc/ca.php';
  }
?>
</div>

<div class="other-years-wrap">
  Other Years:
  <ol class="other-years">
    <?php foreach ($other_years as $other_year) : ?>
    <li><a href="/<?= $other_year ?>"><?= $other_year ?></a></li>
    <?php endforeach; ?>
  </ol>
</div>

<a href="http://thomasjbradley.ca" rel="external" class="thomasjbradley" title="Designed and Developed by Thomas J Bradley">Thomas J Bradley</a>

<script>
  var _gaq=[['_setAccount','UA-561679-4'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
  s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
