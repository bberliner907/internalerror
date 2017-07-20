
<?php

function show_album($entry) {

?>

  <h3><?php echo $entry->type; ?></h3>
  <span class="subheader">
    <span class="smallcaps">"<?php echo $entry->title; ?>"</span>
    <span class="divider">|</span>
    <small style="text-transform: uppercase;"><?php echo $entry->formatted; ?></small>
  </span>
  <img src="images/albums/<?php echo $entry->key; ?>.png" alt="<?php echo $entry->title; ?>" class="album" />
  <iframe style="border: 0; width: 350px; height: 120px; padding-bottom: 5px;" 
    src="https://bandcamp.com/EmbeddedPlayer/album=<?php echo $entry->bandcamp; ?>/size=large/bgcol=333333/linkcol=ffffff/artwork=none/" 
    seamless></iframe>

<?php

}



function show_album_info($entry) {
  
?>

  <p>[ <a href="<?php echo $entry->link; ?>" target="_blank">view on bandcamp</a> ]</p>
  <p>
    <small>
      <?php echo $entry->tracks; ?>
    </small>
  </p>
  <p>
    <span class="credit"><small>
      <?php echo $entry->credits; ?>
    </small></span>
  </p>
    
<?php

}

?>
