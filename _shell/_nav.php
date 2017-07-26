
<div class="infobox" id="navbox">
  <div id="menu">
  
<?php
    
    $i = 0;
    foreach ($pages as $page => $title) {
      $i++;

?>

      <a href="#" onclick="return showPage('<?php echo $page; ?>');" id="<?php echo $page; ?>Nav"><?php echo $title; ?></a>
    
<?php

      if ($i < count($pages)) {
        echo '<span class="divider">|</span>';
      }
    }
    
?>
    
  </div>
</div>
