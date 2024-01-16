<?php
  ini_set("error_reporting",E_ALL);
  ini_set("log_errors","1");
  ini_set("error_log","../course.html/php_errors.txt");
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/A4.css">
    <title>Single Item Page</title>
  </head>
  <body>
  <div class="title">
  <h1><img class="logo" src="../CSS/logo3.png" alt="Website Logo"> Film Guide</h1></div>
  <div class="backgroundImage"></div>
  <div class="itemBody">
    <div class="">
    <?php
      $catalogs = simplexml_load_file("../xml/catalog.xml");
      if ( ! empty( $_COOKIE['screenshot'] ) ) { 
        echo "<p id='screenshot'>". $_COOKIE['screenshot']."</p>\n";
      } 
      if ( ! empty( $_COOKIE['title'] ) ) { 
        echo "    <p id='title'>". $_COOKIE['title']."</p>\n";
      } 
      if ( ! empty( $_COOKIE['length'] ) ) { 
        echo "    <p id='length'>". $_COOKIE['length']."</p>\n";
      } 
      if ( ! empty( $_COOKIE['director'] ) ) { 
        echo "    <p id='director'>". $_COOKIE['director']."</p>\n";
      } 
      if ( ! empty( $_COOKIE['rating'] ) ) { 
        echo "    <p id='rating'>". $_COOKIE['rating']."</p>\n";
      } 
      $numdescription = (int)$_COOKIE['id'];
      echo "    <p id='description'>".$catalogs->catalog[$numdescription]->description."</p>\n";
    ?></div></div>
  </body>
  <script type="text/javascript" src="../js/index.js"></script>
</html>