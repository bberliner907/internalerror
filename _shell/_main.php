
<?php include("../_auth.php"); ?>

<?php include("_library/_ga.php"); ?>

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

?>

<?php include("_library/_blurb.php"); ?>

<?php include("_library/_album.php"); ?>
