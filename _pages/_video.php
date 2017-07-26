
<?php 

if ($mysql_link) {

  $videos = array();
  
  $result = query("SELECT * FROM videos ORDER BY date DESC, tag, id");

  while ($row = query_next($result)) {
    $videos[count($videos)] = $row;
  }

  $total = count($videos);

  for ($v = 0; $v < $total; $v++) {
    $prev = ($v == 0) ? null : $videos[$v - 1]->tag;
    $next = ($v == $total - 1) ? null : $videos[$v + 1]->tag;

    $row = $videos[$v];
  
    if ($v == 0 || !$row->tag || $row->tag != $prev) {
  
?>

      <h3><?php echo $row->type; ?></h3>
      <span class="subheader">
        <span class="smallcaps"><?php echo $row->location; ?></span>
        <span class="divider">|</span>
        <small style="text-transform: uppercase;">
          <?php echo date_text('M Y', $row->date); ?>
        </small>
      </span>
      
      <div class="video">

<?php

    }
  
?>

    <iframe class="youtube" 
      width="<?php echo $row->width; ?>" 
      height="<?php echo $row->height; ?>" 
      src="//www.youtube.com/embed/<?php echo $row->youtube; ?>" 
      frameborder="0" 
      allowfullscreen></iframe>

<?php
  
    if ($v == $total - 1 || !$row->tag || $row->tag != $next) {
  
?>

        <p><small>
          <span class="credit"><?php echo $row->credit; ?></span>
        </small></p>
      </div>

<?php

    }
  }

}

?>
