
<?php

if ($mysql_link) {

?>
  
  <div id="songs" class="contentleft">
    <?php show_blurb("songs"); ?>
    <ul>

<?php 
  
      $songs = array();

      $fields = array("albums.title AS album", "albums.date", "albums.type", "songs.id", "songs.title AS song");
  
      $select = "SELECT DISTINCT " . implode(", ", $fields);
      $join = "FROM songs, albums WHERE songs.album=albums.key AND songs.lyrics IS NOT NULL";
      $order = "ORDER BY albums.position, songs.position, songs.title";
  
      $sql = $select . " " . $join . " " . $order;
      $result = query($sql);
  
      while ($row = query_next($result)) {
        $songs[count($songs)] = $row;
      }
  
      $total = count($songs);
  
      for ($s = 0; $s < $total; $s++) {
        $prev = ($s == 0) ? null : $songs[$s - 1]->album;
        $next = ($s == $total - 1) ? null : $songs[$s + 1]->album;
    
        $row = $songs[$s];
    
        if ($row->album != $prev) {

?>

          <li class="wrapper">
            <span class="toggle">
              <a href="#" 
                onclick="expose(this); return false;" 
                style="text-decoration: none;">+</a>
            </span>
                
            <span class="subheader">
              <span class="smallcaps">
                "<a href="#" 
                onclick="expose(this); return false;" 
                style="text-decoration: none;"><?php echo $row->album; ?></a>"
              </span>
              <br>&nbsp;
              <small><?php echo $row->type; ?></small>
              <span class="divider">|</span>
              <small><?php echo date_text("Y", $row->date) ?></small>
            </span>
          
            <ol class="expose">

<?php

        }

?>

        <li>
          <a href="#" onclick="ajax('lyrics', '<?php echo $row->id; ?>'); return false;">
            <?php echo $row->song; ?>
          </a>
        </li>

<?php
    
        if ($row->album != $next) {
        
?>

            </ol>
          </li>
          
<?php

        }
      }

?>

    </ul>
  </div>
  
  <div id="results" class="contentright">
    <?php show_blurb("words"); ?>
  </div>
  
<?php

}

?>
