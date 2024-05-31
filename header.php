<!DOCTYPE html>
<html lang="ru" class="page">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="theme-color" content="#111111">
  <title>Fashion</title>
  <!-- <link rel="preload" href="fonts/PTSerifRegular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/PTSerifItalic.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/PTSerifBold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/PTSansRegular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/HKGroteskRegular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="stylesheet" href="css/vendor.css">
  <link rel="stylesheet" href="css/main.css">
  <script defer src="js/main.js"></script> -->
  <?php wp_head();?>
</head>

<body class="page__body">
  <div class="site-container">
    <header class="header">
  <div class="container header__container">
    <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="" width="126px" height="33px"></a>
    <nav class="nav">
      <ul class="list-reset nav__list">
        <li class="nav__item"><a href="#" class="nav__link">Home</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Recipes</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Article</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Contact</a></li>
        <li class="nav__item"><a href="#" class="nav__link">Purchase</a></li>
      </ul>
    </nav>
    <div class="header__burger">
      <span></span>
    </div>
  </div>
</header>