
<?php

function show_album($entry) {
  global $albums;

?>

  <h3><?php echo $entry->type; ?></h3>
  <span class="subheader">
    <span class="smallcaps">"<?php echo $entry->title; ?>"</span>
    <span class="divider">|</span>
    <small style="text-transform: uppercase;"><?php echo $entry->formatted; ?></small>
  </span>
  <img src="images/<?php echo $entry->key; ?>.png" alt="<?php echo $entry->title; ?>" class="album" />
  <iframe style="border: 0; width: 350px; height: 120px; padding-bottom: 5px;" 
    src="https://bandcamp.com/EmbeddedPlayer/album=<?php echo $entry->bandcamp; ?>/size=large/bgcol=333333/linkcol=ffffff/artwork=none/" 
    seamless></iframe>

<?php

}

function show_info($entry) {
  global $albums;
  
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


$sql = "SELECT * FROM albums ORDER BY position, date DESC";
$result = mysql_query($sql, $mysql_link);

$split = 0;
while ($row = mysql_fetch_object($result)) {
  $date = date_create($row->date);
  $row->formatted = date_format($date, "M Y");

  if ($row->type == "LP") {
    $split = 0;
  
?>

    <div class="contentleft">
      <?php show_album($row); ?>
    </div>
    <div class="contentright" style="margin-top: 100px;">
      <?php show_info($row); ?>
    </div>

<?php

  } else {
    $class = ($split % 2 == 0) ? "contentleft" : "contentright";
    $split++;
  
?>

    <div class="<?php echo $class; ?>">
      <?php show_album($row); ?>
      <?php show_info($row); ?>
    </div>
  
<?php
  
  }
}

?>
