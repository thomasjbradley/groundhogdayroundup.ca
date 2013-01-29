<?php
  header('Content-Type: text/plain; charset=utf8');

  $domain = (getCountry() == 'ca') ? 'ca' : 'com';
?>
User-agent: *
Disallow:

Sitemap: http://groundhogdayroundup.<?=$domain?>/sitemap.xml
