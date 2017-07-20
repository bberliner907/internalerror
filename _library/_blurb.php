
<?php

function show_blurb($name) {
  global $blurbs;

  if ($blurbs[$name]->title) echo "<h3>" . $blurbs[$name]->title . "</h3>";
  if ($blurbs[$name]->body) echo '<p class="blurb">' . $blurbs[$name]->body . '</p>';

}

?>
