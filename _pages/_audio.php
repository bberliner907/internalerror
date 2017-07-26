
<?php 

if ($mysql_link) {

  $result = query("SELECT * FROM albums ORDER BY position, date DESC");

  $split = 0;
  while ($row = query_next($result)) {
    $row->formatted = date_text("M Y", $row->date);

    if ($row->type == "LP") {
      $split = 0;
  
?>

      <div class="contentleft">
        <?php show_album($row); ?>
      </div>
      <div class="contentright" style="margin-top: 100px;">
        <?php show_album_info($row); ?>
      </div>

<?php

    } else {
      $class = ($split % 2 == 0) ? "contentleft" : "contentright";
      $split++;
  
?>

      <div class="<?php echo $class; ?>">
        <?php show_album($row); ?>
        <?php show_album_info($row); ?>
      </div>
  
<?php
  
    }
  }

}

?>
