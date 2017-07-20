
<?php 

if ($mysql_link) {

?>

  <div class="contentleft">

    <?php show_blurb("recent"); ?>
  
    <div class="shows past">
  
<?php

      $sql = "SELECT * FROM shows WHERE date < NOW() ORDER BY date DESC";
      $result = mysql_query($sql, $mysql_link);

      while ($row = mysql_fetch_object($result)) {
        $date = date_create($row->date);
      
?>

        <p>
          <small style="text-transform: uppercase;"><?php echo date_format($date, "M d, Y"); ?></small>
          <span class="divider">|</span>
          <?php echo $row->location; ?>
        </p>
      
<?php

      }

?>
  
    </div>
  </div>

  <div class="contentright">
  
<?php

    $sql = "SELECT * FROM shows WHERE date >= NOW() ORDER BY date DESC";
    $result = mysql_query($sql, $mysql_link);

    if (mysql_num_rows($result)) {
      while ($row = mysql_fetch_object($result)) {
        $date = date_create($row->date);
    
?>

        <h3><?php echo $blurbs[$name]->title; ?></h3>
        <p>
          <small style="text-transform: uppercase;">
        
<?php

            $formatted = date_format($date, "M d");
            if ($row->link) {
              echo '<a href="' . $row->link . '" target="_blank">' . $formatted .'</a>';
            } else echo $formatted;

?>

          </small>
          <span class="divider">|</span>

<?php

          echo $row->location;

          if ($row->time) {
            echo ' <span class="divider">|</span> <small>' . $row->time . '</small>';
          }
          if ($row->price) {
            echo ' <span class="divider">|</span> <small>' . $row->price . '</small>';
          }
        
?>

        </p>
    
<?php

      }
    } else {
      show_blurb("upcoming");
    }
  
    show_blurb("booking");

?>
  
  </div>

<?php

}

?>
