
<?php
  
function lyrics($record) {
  $fields = array("songs.title", "songs.lyrics", "albums.date", "albums.key");

  $select = "SELECT DISTINCT " . implode(", ", $fields);
  $join = "FROM songs, albums WHERE songs.album=albums.key AND songs.id='" . htmlspecialchars($record) . "'";
  $limit = "LIMIT 1";

  $sql = $select . " " . $join . " " . $limit;
  $result = query($sql);
  
  $row = query_next($result);
  
  if ($row->lyrics) {
    $text = preg_replace("/(\r\n|\r|\n)/", "<br>", trim($row->lyrics));
    $text .= "<br><br><small>&copy; " . date_text("Y", $row->date) . " Internal Error</small>";
  
?>

    <h3><?php echo $row->title; ?></h3>
    <p><?php echo $text; ?></p>

<?php

  }
}

?>
