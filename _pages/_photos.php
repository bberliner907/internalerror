
<?php 

if ($mysql_link) {

  $result = query("SELECT * FROM photos ORDER BY date DESC");

  while ($row = query_next($result)) {

?>

    <div class="post">
      <h3 class="blog">
        <?php echo date_text('M d, Y', $row->date); ?>
      </h3>
      <span class="smallcaps subheader">
        <?php echo $row->title; ?>
      </span>
      
      <div class="photos">
        
<?php

        $files = scandir('images/photos/' . $row->directory);
  	
        for ($f = 0; $f < count($files); $f++) {
          if ($files[$f] != "." && $files[$f] != "..") {
      		
            $img = $row->directory . "_" . str_ireplace(array(".jpg", ".jpeg"), "", $files[$f]);
   
?>
        
            <a href="#" onclick="expand('<?php echo $img; ?>'); return false;">
              <img src="images/photos/<?php echo $row->directory; ?>/<?php echo $files[$f]; ?>" 
                name="<?php echo $img; ?>"
                class="photo" /></a>
        
<?php

          }
        }
    
?>

      </div>
    </div>

<?php

  }
  
?>

  <?php show_blurb("credits"); ?>
	
<?php

}

?>
