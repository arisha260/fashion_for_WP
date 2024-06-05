<footer class="footer">
  <div class="container footer__container">
    <picture>
      <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo.webp" type="image/webp">
      <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" class="footer__logo" width="128" height="32" alt="" >
    </picture>
    

    <?php



      function add_additional_class_on_li_footer($classes, $item, $args) {
        if (isset($args->li_class)) {
            $classes[] = $args->li_class;
        }
        return $classes;
        }
        add_filter('nav_menu_css_class', 'add_additional_class_on_li_footer', 1, 3);
        

        function add_additional_class_on_a_footer($atts, $item, $args) {
          if (isset($args->a_class)) {
              $atts['class'] = $args->a_class;
          }
          return $atts;
        }
        add_filter('nav_menu_link_attributes', 'add_additional_class_on_a_footer', 1, 3);

        // Вывод меню с использованием нового класса для элементов li
        wp_nav_menu( [
            'theme_location'  => '',
            'menu'            => '',
            'container'       => 'div',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'list-reset footer-nav',
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
            'li_class'        => 'footer-nav__item', // Задаем класс для li
            'a_class'         => 'footer-nav__link', // Класс для <a>
        ] );
      ?>




    


    <ul class="list-reset footer-social">

    <?php 
    $my_posts = get_posts( array(
      'numberposts' => -1,
      'category'    => 0,
      'orderby'     => 'date',
      'order'       => 'DESC',
      'include'     => array(),
      'exclude'     => array(),
      'meta_key'    => '',
      'meta_value'  =>'',
      'post_type'   => 'social',
      'suppress_filters' => true, 
    ) );

    global $post;

    foreach( $my_posts as $post ){
      setup_postdata( $post );
      $img_id = get_post_meta(get_the_ID(), 'img', true);
      $img_url = wp_get_attachment_url($img_id);
    ?>

      <li class="footer-social__item">
        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true);?>" class="footer-social__link" target="_blank">
          <img src="<?php echo esc_url($img_url); ?>" class="footer-social__img" alt="">
        </a>
      </li>


    <?php 
      
    }


    wp_reset_postdata();
    ?>


      <!-- <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8.78312 0.211465L6.78402 0.208252C4.53809 0.208252 3.08668 1.69991 3.08668 4.00866V5.7609H1.07667C0.90298 5.7609 0.762329 5.90195 0.762329 6.07594V8.61474C0.762329 8.78872 0.90314 8.92962 1.07667 8.92962H3.08668V15.3358C3.08668 15.5098 3.22733 15.6507 3.40102 15.6507H6.02351C6.1972 15.6507 6.33785 15.5096 6.33785 15.3358V8.92962H8.68802C8.86171 8.92962 9.00236 8.78872 9.00236 8.61474L9.00332 6.07594C9.00332 5.9924 8.97012 5.91239 8.91126 5.85327C8.8524 5.79415 8.77222 5.7609 8.68882 5.7609H6.33785V4.2755C6.33785 3.56156 6.50769 3.19913 7.43611 3.19913L8.7828 3.19865C8.95633 3.19865 9.09698 3.05759 9.09698 2.88377V0.526345C9.09698 0.352679 8.95649 0.211786 8.78312 0.211465Z" fill="currentColor" />
          </svg>
        </a>
      </li>
      <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15.7916 2.1344C15.2185 2.39029 14.6019 2.56336 13.9553 2.64066C14.6155 2.24242 15.1221 1.61231 15.3613 0.860244C14.7435 1.22919 14.059 1.49684 13.331 1.64111C12.7478 1.01579 11.9169 0.625 10.9968 0.625C9.23147 0.625 7.7997 2.06647 7.7997 3.84377C7.7997 4.09605 7.82807 4.34162 7.88291 4.57734C5.22584 4.44316 2.86991 3.1618 1.29293 1.21383C1.01778 1.68912 0.859943 2.24242 0.859943 2.83222C0.859943 3.94867 1.42478 4.93429 2.28218 5.51136C1.75835 5.4948 1.26504 5.35005 0.834193 5.10832C0.833954 5.12201 0.833954 5.13569 0.833954 5.14913C0.833954 6.70871 1.93646 8.00951 3.39875 8.30501C3.13075 8.37894 2.84774 8.41807 2.55661 8.41807C2.35013 8.41807 2.15009 8.39814 1.95505 8.3607C2.36182 9.63918 3.54229 10.5698 4.94163 10.596C3.84724 11.4594 2.46887 11.9739 0.970575 11.9739C0.71307 11.9739 0.45795 11.9587 0.208313 11.9287C1.62244 12.8423 3.30338 13.375 5.10877 13.375C10.9894 13.375 14.2054 8.4704 14.2054 4.21656C14.2054 4.07709 14.2023 3.9381 14.1961 3.80032C14.8212 3.34663 15.3632 2.77989 15.7916 2.1344Z" fill="currentColor" />
          </svg>
        </a>
      </li>
      <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.8088 1.80026C9.75555 0.773661 8.29797 0.208252 6.70457 0.208252C4.27057 0.208252 2.77356 1.22127 1.94633 2.07104C0.926837 3.11828 0.342224 4.5088 0.342224 5.88615C0.342224 7.6155 1.05466 8.94284 2.24772 9.43664C2.32782 9.46996 2.40841 9.48675 2.48742 9.48675C2.73911 9.48675 2.93854 9.31954 3.00763 9.05132C3.0479 8.89744 3.14122 8.51783 3.18179 8.35302C3.26865 8.02758 3.19847 7.87104 3.00906 7.64441C2.664 7.22987 2.50331 6.73967 2.50331 6.10171C2.50331 4.20676 3.89304 2.1928 6.46877 2.1928C8.5125 2.1928 9.78205 3.37217 9.78205 5.27063C9.78205 6.46864 9.52789 7.57812 9.06626 8.39481C8.74548 8.96228 8.1814 9.63872 7.31543 9.63872C6.94096 9.63872 6.60458 9.48254 6.39232 9.21026C6.19181 8.95286 6.12573 8.62035 6.20637 8.2738C6.29747 7.88227 6.42169 7.47384 6.54191 7.079C6.76117 6.35786 6.96845 5.67675 6.96845 5.13334C6.96845 4.20385 6.40565 3.57931 5.56811 3.57931C4.50371 3.57931 3.66982 4.67696 3.66982 6.07821C3.66982 6.76543 3.8497 7.27943 3.93113 7.4768C3.79705 8.05363 3.00013 11.483 2.84896 12.1297C2.76156 12.5072 2.23504 15.4888 3.10653 15.7266C4.0857 15.9937 4.96094 13.0898 5.05002 12.7617C5.12222 12.4948 5.37485 11.4857 5.52967 10.8653C6.00235 11.3276 6.76344 11.6402 7.50401 11.6402C8.9001 11.6402 10.1556 11.0023 11.0394 9.84416C11.8965 8.72086 12.3685 7.15521 12.3685 5.43583C12.3685 4.09166 11.8 2.76652 10.8088 1.80026Z" fill="currentColor" />
          </svg>
        </a>
      </li>
      <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.2231 6.96186C0.103837 3.7604 2.85426 0.801866 5.9975 0.763482C7.59952 0.624172 9.1581 1.25845 10.3705 2.29295C9.87316 2.85046 9.36714 3.40152 8.82664 3.91743C7.75933 3.25631 6.47429 2.75248 5.22689 3.19994C3.21495 3.78402 1.99652 6.20599 2.74106 8.2127C3.35764 10.3085 5.85796 11.4587 7.81751 10.5783C8.83217 10.2079 9.50115 9.25337 9.7947 8.22774C8.63182 8.20411 7.46867 8.21888 6.30579 8.18613C6.30289 7.48072 6.3 6.77799 6.30289 6.07258C8.24217 6.06963 10.1843 6.06372 12.1265 6.08144C12.2458 7.8098 11.9957 9.65949 10.8936 11.0467C9.38452 13.0268 6.59645 13.608 4.32834 12.8312C1.92122 12.0251 0.170709 9.55266 0.2231 6.96186Z" fill="currentColor" />
            <path d="M15.9066 4.2937C16.4824 4.2937 17.0579 4.2937 17.6363 4.2937C17.6395 4.88369 17.645 5.47663 17.6482 6.06635C18.2266 6.07226 18.8082 6.07521 19.3868 6.07816C19.3868 6.66815 19.3868 7.25492 19.3868 7.84491C18.8084 7.84786 18.2268 7.85082 17.6482 7.85377C17.6424 8.44671 17.6395 9.03643 17.6363 9.62937C17.0579 9.62642 16.479 9.62937 15.9034 9.62937C15.8979 9.03643 15.8979 8.44671 15.8919 7.85672C15.3134 7.85055 14.7319 7.84786 14.1532 7.84464C14.1532 7.25465 14.1532 6.66789 14.1532 6.0779C14.7319 6.07494 15.3106 6.07199 15.8919 6.06609C15.8948 5.47663 15.9006 4.88369 15.9066 4.2937Z" fill="currentColor" />
          </svg>
        </a>
      </li>
      <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="20" height="12" viewBox="0 0 20 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.22509 5.39891C8.22509 5.39891 9.96515 5.27468 9.96515 3.28734C9.96515 1.30552 8.54195 0.333252 6.73511 0.333252H0.791687V11.4311H6.73457C6.73457 11.4311 10.365 11.5393 10.365 8.15314C10.3653 8.15314 10.521 5.39891 8.22509 5.39891ZM10.8154 7.41882C10.8154 7.39702 10.8211 3.1576 15.2018 3.1576C19.8275 3.1576 19.177 7.97481 19.177 7.97481H13.2617C13.2617 10.0325 15.2686 9.90279 15.2686 9.90279C17.1698 9.90279 17.1033 8.70939 17.1033 8.70939H19.1102C19.1102 11.8794 15.2018 11.6635 15.2018 11.6635C10.5153 11.6635 10.8154 7.41882 10.8154 7.41882ZM15.2465 4.78304C13.4839 4.78304 13.2393 6.48962 13.2393 6.48962H16.9865C16.9865 6.48962 17.0144 4.78304 15.2465 4.78304ZM6.73484 2.30431H3.41044V4.78304H6.52909C7.06847 4.78304 7.54106 4.61548 7.54106 3.45989C7.54106 2.30431 6.73484 2.30431 6.73484 2.30431ZM6.56829 9.46H3.41044V6.48962H6.73484C6.73484 6.48962 7.94147 6.47885 7.9358 8.01788C7.9358 9.31423 7.04089 9.44923 6.56829 9.46ZM12.7445 2.35316V0.986682H17.4591V2.35316H12.7445Z" fill="currentColor" />
          </svg>
        </a>
      </li>
      <li class="footer-social__item">
        <a href="" class="footer-social__link">
          <svg class="footer__svg" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.8125 0.5H12.1875C15.1211 0.5 17.5 2.87894 17.5 5.8125V12.1875C17.5 15.1211 15.1211 17.5 12.1875 17.5H5.8125C2.87894 17.5 0.5 15.1211 0.5 12.1875V5.8125C0.5 2.87894 2.87894 0.5 5.8125 0.5ZM12.1875 15.9062C14.2381 15.9062 15.9062 14.2381 15.9062 12.1875V5.8125C15.9062 3.76187 14.2381 2.09375 12.1875 2.09375H5.8125C3.76187 2.09375 2.09375 3.76187 2.09375 5.8125V12.1875C2.09375 14.2381 3.76187 15.9062 5.8125 15.9062H12.1875Z" fill="currentColor"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.75 9C4.75 6.65294 6.65294 4.75 9 4.75C11.3471 4.75 13.25 6.65294 13.25 9C13.25 11.3471 11.3471 13.25 9 13.25C6.65294 13.25 4.75 11.3471 4.75 9ZM6.34375 9C6.34375 10.4641 7.53587 11.6562 9 11.6562C10.4641 11.6562 11.6562 10.4641 11.6562 9C11.6562 7.53481 10.4641 6.34375 9 6.34375C7.53587 6.34375 6.34375 7.53481 6.34375 9Z" fill="currentColor"/>
            <path d="M13.6042 5.45825C14.191 5.45825 14.6667 4.98255 14.6667 4.39575C14.6667 3.80895 14.191 3.33325 13.6042 3.33325C13.0174 3.33325 12.5417 3.80895 12.5417 4.39575C12.5417 4.98255 13.0174 5.45825 13.6042 5.45825Z" fill="currentColor"/>
          </svg>
        </a>
      </li> -->
    </ul>

    <span class="footer__copy">@2019 Logwork. All Right Reserved.</span>
  </div>
</footer>

<?php wp_footer();?>
</body>
</html>