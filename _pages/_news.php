
<?php 

if ($mysql_link) {

  $sql = "SELECT * FROM news ORDER BY date DESC";
  $result = mysql_query($sql, $mysql_link);

  while ($row = mysql_fetch_object($result)) {

  ?>

    <div class="post">
      <h3 class="blog">
    
  <?php

        $date = date_create($row->date);
        echo date_format($date, 'M d, Y');

  ?>

      </h3>
      <span class="smallcaps subheader">
        <?php echo $row->headline; ?>
      </span>
      <div class="postline">
        <div class="prompt"><p>&gt;</p></div>
        <div class="body">
          <p class="blurb">
            <?php echo $row->body; ?>
          </p>
        </div>
      </div>
    </div>

  <?php

  }

}

?>
