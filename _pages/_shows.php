
<?php 

if ($mysql_link) {

?>

  <div class="contentleft">

    <?php show_blurb("recent"); ?>
  
    <div class="shows past">
  
<?php

      $result = query("SELECT * FROM shows WHERE date < NOW() ORDER BY date DESC");

      while ($row = query_next($result)) {
      
?>

        <p>
          <small style="text-transform: uppercase;">
            <?php echo date_text("M d, Y", $row->date); ?>
          </small>
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

    $result = query("SELECT * FROM shows WHERE date >= NOW() ORDER BY date DESC");

    if (query_rows($result)) {
      while ($row = query_next($result)) {
    
?>

        <h3><?php echo $blurbs[$name]->title; ?></h3>
        <p>
          <small style="text-transform: uppercase;">
        
<?php

            $formatted = date_text("M d", $row->date);
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
