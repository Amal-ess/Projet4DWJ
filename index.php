<?php 
  include 'fonctions/main-functions.php';

  $pages = scandir('pages/');
  if (isset ($_GET['page']) && !empty($_GET['page'])){
    if(in_array($_GET['page']. '.php',$pages)){
      $page = $_GET['page'];
    }else{
      $page="error";
    }
   }else{
    $page = "home";
  }

  $pages_functions = scandir ('fonctions/');
  if (in_array($page.'.func.php',$pages_functions)){
    include 'fonctions/'.$page.'.func.php';
  }
?>


<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Great+Vibes" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil|Open+Sans+Condensed:300|Roboto+Condensed" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
      <link rel="stylesheet" href="css/style.css">
      <title>Blog de Jean Forteroche</title>


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <?php
          include "body/header.php"; ?>

      <div class="container">
        <?php 
          include 'pages/'.$page.'.php';
         ?>
      </div>

      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.js"></script>
      <script type="text/javascript" src="js/script.js"></script>
      <script type="text/javascript" src="js/post.func.js"></script>
    </body>
  </html>