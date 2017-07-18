
<?php

auth("internalerror");

$backgrounds = array();
$pages = array();
$blurbs = array();

$sql = "SELECT * FROM photos ORDER BY id";
$result = mysql_query($sql, $mysql_link);

while ($row = mysql_fetch_object($result)) {
  $backgrounds[$row->id] = $row->name;
}

$sql = "SELECT * FROM pages ORDER BY id";
$result = mysql_query($sql, $mysql_link);

while ($row = mysql_fetch_object($result)) {
  $pages[$row->page] = $row->title;
}

$sql = "SELECT * FROM blurbs ORDER BY id";
$result = mysql_query($sql, $mysql_link);

while ($row = mysql_fetch_object($result)) {
  $blurbs[$row->name] = $row;
}

function show_blurb($name) {
  global $blurbs;

  if ($blurbs[$name]->title) echo "<h3>" . $blurbs[$name]->title . "</h3>";
  if ($blurbs[$name]->body) echo '<p class="blurb">' . $blurbs[$name]->body . '</p>';

}

?>
