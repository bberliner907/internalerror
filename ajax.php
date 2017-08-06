<?php

if ($_POST["action"] && $_POST["record"]) {
  $action = htmlspecialchars(preg_replace("/(\'|\"|\/|\\|\.|\W)/", "", $_POST["action"]));
  $record = htmlspecialchars(preg_replace("/\D/", "", $_POST["record"]));

  $file = "_actions/_" . $action . ".php";

  if (file_exists($file) && $record > 0) {

    include("../_auth.php");
  
    include("_library/_query.php");
    include("_library/_date.php");

    auth("internalerror");

    include($file);
    $action($record);

  }
}

?>