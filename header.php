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
    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="" width="126px" height="33px"></a>
    <nav class="nav">
    <?php
      function add_additional_class_on_li($classes, $item, $args) {
        if (isset($args->li_class)) {
            $classes[] = $args->li_class;
        }
        return $classes;
        }
        add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
        

        function add_additional_class_on_a($atts, $item, $args) {
          if (isset($args->a_class)) {
              $atts['class'] = $args->a_class;
          }
          return $atts;
        }
        add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

        // Вывод меню с использованием нового класса для элементов li
        wp_nav_menu( [
            'theme_location'  => '',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'list-reset nav__list',
            'menu_id'         => '',
            'echo'            => true,
            'fallback_cb'     => 'wp_page_menu',
            'before'          => '',
            'after'           => '',
            'link_before'     => '',
            'link_after'      => '',
            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth'           => 0,
            'walker'          => '',
            'li_class'        => 'nav__item', // Задаем класс для li
            'a_class'         => 'nav__link', // Класс для <a>
        ] );
      ?>
    </nav>
    <div class="header__burger">
      <span></span>
    </div>
  </div>
</header>