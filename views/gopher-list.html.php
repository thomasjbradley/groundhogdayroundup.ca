<ul class="gopher-list">
  <?php foreach ($gophers_list as $id => $gopher) : ?>
  <li class="gopher" data-state="<?=$gophers_data->{$id}?>" tabindex="0" itemprop="subEvent" itemscope itemtype="http://schema.org/Event">
    <h3 class="gopher-name" itemprop="performer" itemscope itemtype="http://schema.org/Person"><span itemprop="name"><?=$gopher->name?></span></h3>
    <meta itemprop="name" content="Groundhog Day, <?=$year?> in <?=$gopher->adr->locality?>, <?=$gopher->adr->region?>">
    <p class="gopher-location" itemprop="location" itemscope itemtype="http://schema.org/PostalAddress">
      <span itemprop="addressLocality"><?=$gopher->adr->locality?></span>,
      <span itemprop="addressRegion"><?=$gopher->adr->region?></span>
      <meta itemprop="addressCountry" content="<?=$country?>">
    </p>
    <div class="gopher-icon">
      <div class="gopher-body gopher-<?=$gopher->colour?>"><?=$text[$gophers_data->{$id}]?></div>
      <div class="gopher-ground"></div>
      <div class="gopher-shadow"></div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
