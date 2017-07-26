
      <div class="infobox" id="bottombox">
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

  </body>
</html>
