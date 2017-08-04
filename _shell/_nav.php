
<div class="infobox" id="navbox">
  <div id="menu">
  
<?php
    
    $i = 0;
    foreach ($pages as $page => $title) {
      $i++;
      
      $pageClass = (page_active($page)) ? "active" : "";

?>

      <a href="?page=<?php echo $page; ?>" 
      	onclick="return showPage('<?php echo $page; ?>');" 
      	id="<?php echo $page; ?>Nav"
      	class="<?php echo $pageClass; ?>"><?php echo $title; ?></a>
    
<?php

      if ($i < count($pages)) {
        echo '<span class="divider">|</span>';
      }
    }
    
?>
    
  </div>
</div>
