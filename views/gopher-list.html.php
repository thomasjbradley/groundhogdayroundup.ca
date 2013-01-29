<ul class="gopher-list">
  <?php foreach ($gophers_list as $id => $gopher) : ?>
  <li class="gopher" data-state="<?=$gophers_data->{$id}?>" tabindex="0">
    <h3 class="gopher-name"><?=$gopher->name?></h3>
    <p class="gopher-location"><?=$gopher->adr->locality?>, <?=$gopher->adr->region?></p>
    <div class="gopher-icon">
      <div class="gopher-body gopher-<?=$gopher->colour?>"><?=$text[$gophers_data->{$id}]?></div>
      <div class="gopher-ground"></div>
      <div class="gopher-shadow"></div>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
