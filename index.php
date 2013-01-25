<?php

require_once 'utils.php';

$text = array(
  'shadow' => 'Saw his shadow—more winter is coming.'
  , 'no-shadow' => 'Didn’t see his shadow—spring’s on the way.'
  , 'still-hibernating' => 'Hasn’t woken up yet.'
);

$domain = (stripos($_SERVER['HTTP_HOST'], '.ca') !== false) ? 'ca' : 'us';
$year = getYear();
$gophers = getGopherList($year);
$other_years = getAllYears();

$glob = glob(__DIR__ . '/theme/css/theme*.css');
$themeCss = basename($glob[0]);

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
  <script src="/theme/js/modernizr.min.js"></script>
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

<a href="http://thomasjbradley.ca" rel="external" class="thomasjbradley" title="Designed and developed by Thomas J Bradley">Thomas J Bradley</a>

<script>
  Modernizr.load({
    test: Modernizr.inlinesvg
    , nope: ['/theme/css/no-svg.css']
  });

  if (Modernizr.cssanimations) {
    document.body.className += ' js-gopher-animations';

    setTimeout(function () {
      document.body.className = document.body.className.replace(/js-gopher-animations/, '');
    }, 700);

    setTimeout(function () {
      document.body.className += ' js-gopher-shadow-start';
    }, 400);

    var gophers = document.getElementsByClassName('gopher')

    for (var i = 0, t = gophers.length; i < t; i++) {
      gophers[i].addEventListener('touchstart', function (e) {
        this.focus();
      }, false);
    }
  }

  if (!Modernizr.inlinesvg) {
    ;(function () {
      var imgs = document.getElementsByTagName('img')
        , totalImgs = imgs.length
        , i = 0

        for (i = 0; i < totalImgs; i++) {
          imgs[i].src = imgs[i].src.replace(/svg$/, 'png')
        }
    }())
  }

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-561679-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

</body>
</html>
