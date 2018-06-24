
<?php 

if ($mysql_link) {

  $result = query("SELECT * FROM albums ORDER BY position, date DESC");

  while ($row = query_next($result)) {
    $row->formatted = date_text("M Y", $row->date);
    
    $bc = "https://bandcamp.com/EmbeddedPlayer/album=" . $row->bandcamp . "/size=large/bgcol=333333/linkcol=ffffff/artwork=none/transparent=true/";
  
?>

    <div class="contentleft">
    
      <h3><?php echo $row->type; ?></h3>
      <span class="subheader">
        <span class="smallcaps">"<?php echo $row->title; ?>"</span>
        <span class="divider">|</span>
        <small style="text-transform: uppercase;"><?php echo $row->formatted; ?></small>
      </span>
      <a href="#" onclick="expand('<?php echo $row->key; ?>'); return false;"><img src="images/albums/thumbs/<?php echo $row->key; ?>.png" 
      	name="<?php echo $row->key; ?>"
        alt="<?php echo $row->title; ?>" 
        class="album" /></a>
        
    </div>
    
    <div class="contentright" style="margin-top: 88px;">
      
      <iframe class="bandcamp"
        src="<?php echo $bc; ?>" 
        data-src="<?php echo $bc; ?>" 
        seamless></iframe>
      <p>
        <span class="credit"><small>
          <?php echo $row->credits; ?>
        </small></span>
      </p>

    </div>

<?php

  }
  
}

?>
