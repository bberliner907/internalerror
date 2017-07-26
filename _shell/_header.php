
<!DOCTYPE html>

<html>
  <head>
  
    <title>Internal Error</title>
    
    <link rel="stylesheet" type="text/css" href="static/styles.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="static/scripts.js"></script>
    
    <meta name="description" content="<?php echo $blurbs["readme"]->body; ?>" />
    <meta name="keywords" content="internal,error,band,music,rock,seattle" />
    
    <?php ga("UA-102875976-1"); ?>
  
  </head>
  
  <body>
  
    <div id="main">
      
<?php

      foreach ($backgrounds as $b => $name) {
        $style = "background: url('images/backgrounds/" . $name . ".jpg') no-repeat;";
        if ($b > 1) $style .= " display: none;";
        
?>

        <div id="background<?php echo $b; ?>" class="background" style="<?php echo $style; ?>"></div>

<?php

      }

?>
    
      <a href="http://www.internalerror.org" onclick="return showPage('home');" id="homelink">
        <img src="images/internalerror.png" alt="Internal Error" id="logo" />
      </a>

      <?php include("_shell/_nav.php"); ?>
