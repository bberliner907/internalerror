
      <div class="infobox" id="bottombox">
        <!-- MAY CAUSE AUDITORY DELIRIUM. -->
        
        <span id="social">
        
<?php

          $sql = "SELECT * FROM links ORDER BY id";
          $result = mysql_query($sql, $mysql_link);

          while ($row = mysql_fetch_object($result)) {
              
?>
    
            <a href="<?php echo $row->link; ?>" 
              title="<?php echo $row->name; ?>" 
              target="_blank">
              <img src="images/icons/<?php echo $row->icon; ?>" 
                style="border-radius:4px;" /></a>

<?php

          }

?>

        </span>
      </div>

    </div>
    
<?php

      $date = date_create();
      $formatted = date_format($date, "Y");
    
?>
    
    <div id="footer">
      &copy; <?php echo $formatted; ?> Internal Error
    </div>

  </body>
</html>
