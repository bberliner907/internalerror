
<?php include("_global.php"); ?>

<?php include("_shell/_header.php"); ?>

<?php

foreach ($pages as $page => $title) {
  $style = (page_active($page)) ? "display: block;" : "display: none;";

?>

  <div class="page" id="<?php echo $page; ?>" style="<?php echo $style; ?>">
    <h2>
      <?php echo $title; ?>
      <a class="close" href="/" onclick="return showPage('home');">&times;</a>
    </h2>
    <div class="content">
  
      <?php include("_pages/_" . $page . ".php"); ?>
  
    </div>
  </div>

<?php

}

?>

<?php include("_shell/_footer.php"); ?>
