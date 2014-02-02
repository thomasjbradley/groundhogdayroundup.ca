<?php
  header('Content-Type: application/xml; charset=utf8');

  $years = getAllYears();
  $domain = (getCountry() == 'ca') ? 'ca' : 'com';

  echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://groundhogdayroundup.<?=$domain?>/</loc>
    <priority>1.0</priority>
  </url>
  <?php foreach ($years as $url) : ?>
  <url>
    <loc>http://groundhogdayroundup.<?=$domain?>/<?=$url?></loc>
  </url>
  <?php endforeach; ?>
</urlset>
