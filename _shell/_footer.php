
      </div>
      
      <div class="infobox" 
        id="bottombox"
        style="<?php if (page_param()) { echo "display: none;"; } ?>">
        
        <!-- MAY CAUSE AUDITORY DELIRIUM. -->
        <span id="social">
        
<?php

          foreach ($links as $l => $row) {
              
?>
    
            <a href="<?php echo $row->link; ?>" 
              title="<?php echo $row->name; ?>" 
              target="_blank">
              <img src="images/icons/<?php echo $row->icon; ?>" 
                style="border-radius: 4px;" /></a>

<?php

          }

?>

        </span>
      </div>

    </div>
    
    <div id="footer">
      &copy; <?php echo date_text("Y"); ?> Internal Error
    </div>
    
    <div id="zoom">
      <span id="close">
        <a href="#" onclick="collapse(); return false;">&times;</a>
      </span>
      <img src="" border="0" />
    </div>

  </body>
</html>
