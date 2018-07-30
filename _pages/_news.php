
<?php 

if ($mysql_link) {

  $result = query("SELECT * FROM news WHERE status='live' ORDER BY date DESC");

  while ($row = query_next($result)) {

?>

    <div class="post">
      <h3 class="blog">
        <?php echo date_text('M d, Y', $row->date); ?>
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
