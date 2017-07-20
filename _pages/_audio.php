
<?php 

if ($mysql_link) {

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
