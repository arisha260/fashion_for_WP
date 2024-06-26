<?php 

get_header();

?>
<main class="main">
  <section class="hero">
    <div class="container hero__container">
      <div class="hero__content">
        <span class="hero__descr">Vehicle</span>
        <h1 class="hero__title">One of Saturn’s largest rings may be newer than anyone</h1>
        <div class="hero__info">
          <span>June 6, 2019</span>
          <span>By Rickie Baroch</span>
          <span>4 comments</span>
        </div>
      </div>
    </div>
  </section>
  <section class="blog">
    <div class="container blog__container">
      <div class="blog__left">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $query = new WP_Query(array(
        'posts_per_page' => 11, // Количество постов на странице
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'ASC',
        'post_type' => 'post',
      ));

      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
          if ($query->current_post === 6) {
            // Отдельная карточка
            ?>
            <article class="blog-card">        
              <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-card__image" width="770" height="339" alt="">
              <div class="blog-card__content blog-card__content-full">
                <p class="blog-card__categories"><?php the_category(', '); ?></p>
                <a href="<?php the_permalink(); ?>" class="blog-card__title"><?php the_title(); ?></a>
                <div class="blog-card__info">
                  <span><?php the_time('F j, Y'); ?></span>
                  <span>By <?php the_author(); ?></span>
                  <span><?php comments_number(); ?></span>
                </div>
                <p class="blog-card__descr"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></p>
              </div>
            </article>
            <?php
          } else {
            // Обычная карточка
            ?>
            <article class="blog-card">
              <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-card__image" width="370" height="280" alt="">
              <div class="blog-card__content">
                <p class="blog-card__categories"><?php the_category(', '); ?></p>
                <a href="<?php the_permalink(); ?>" class="blog-card__title"><?php the_title(); ?></a>
                <div class="blog-card__info">
                  <span><?php the_time('F j, Y'); ?></span>
                  <span>By <?php the_author(); ?></span>
                </div>
              </div>
            </article>
            <?php
          }
        endwhile;

        add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
        function my_navigation_template($template, $class)
        {
          return '
          <nav class="navigation %1$s" role="navigation">
            <div class="nav-links">%3$s</div>
          </nav>
          ';
        }

        the_posts_pagination(array(
          'mid_size' => 2,
          'prev_text' => __('< Older Posts', 'textdomain'),
          'next_text' => __('Next Posts >', 'textdomain'),
        ));

      else :
        echo '<p>No posts found</p>';
      endif;

      wp_reset_postdata();
      ?>
      
      </div>
      <div class="aside">
        <div class="aside__item author">
          <a href="#" class="btn aside__button">About the author</a>
          <article class="author__card">
            <a href="<?php echo get_author_posts_url(1); ?>">
              <img loading="lazy" src="<?php echo get_avatar_url(1); ?>" class="author__image" width="270" height="180" alt="">
            </a>
            <div class="author__content">
              <h2 class="author__title"><?php the_author(); ?></h2>
              <span>programmist</span>
              <p class="author__descr"><?php the_author_meta('description'); ?></p>
            </div>
            <a href="" class="author__button">Continue Reading</a>
          </article>
        </div>
        <div class="aside__item featured">
          <a href="#" class="btn aside__button">Featured posts</a>
          <div class="featured__container">
            <article class="featured__card">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog13.webp" type="image/webp">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog13.png"
                  class="featured__image" width="270" height="160" alt="">
              </picture>
              <div class="featured__content">
                <p class="featured__categories">jeans</p>
                <h2 class="featured__title">One of Saturn’s largest rings may be newer than anyone</h2>
                <div class="featured__info">
                  <span>June 6, 2019</span>
                  <span>By Rickie Baroch</span>
                </div>
              </div>
            </article>
            <article class="featured__card">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog14.webp" type="image/webp">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog14.png"
                  class="featured__image" width="270" height="160" alt="">
              </picture>
              <div class="featured__content">
                <p class="featured__categories">city</p>
                <h2 class="featured__title">One of Saturn’s largest rings may be newer than anyone</h2>
                <div class="featured__info">
                  <span>June 6, 2019</span>
                  <span>By Rickie Baroch</span>
                </div>
              </div>
            </article>
            <article class="featured__card">
              <picture>
                <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/blog15.webp" type="image/webp">
                <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/blog15.png"
                  class="featured__image" width="270" height="160" alt="">
              </picture>
              <div class="featured__content">
                <p class="featured__categories">Photography</p>
                <h2 class="featured__title">One of Saturn’s largest rings may be newer than anyone</h2>
                <div class="featured__info">
                  <span>June 6, 2019</span>
                  <span>By Rickie Baroch</span>
                </div>
              </div>
            </article>
          </div>
        </div>
        <div class="aside__filters">
          <div class="aside__item categories">
            <a data-btn="btn1" class="btn aside__button filters-btn">Categories</a>
            <div id="btn1" class="categories__content filters-menu">
              <a class="categories__categoria">
                <p class="categories__descr">Fashion</p>
                <span class="categories__count">(23)</span>
              </a>
              <a class="categories__categoria">
                <p class="categories__descr">Style & clothes</p>
                <span class="categories__count">(7)</span>
              </a>
              <a class="categories__categoria">
                <p class="categories__descr">Minimalism</p>
                <span class="categories__count">(16)</span>
              </a>
              <a class="categories__categoria">
                <p class="categories__descr">Black & White</p>
                <span class="categories__count">(5)</span>
              </a>
              <a class="categories__categoria">
                <p class="categories__descr">Modern clothes</p>
                <span class="categories__count">(12)</span>
              </a>
            </div>
          </div>
          <div class="aside__item social">
            <a data-btn="btn2" class="btn aside__button filters-btn">Social media</a>
            <div id="btn2" class="social__content filters-menu">
              <div class="social__item">
                <svg width="11" height="20" viewBox="0 0 11 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M10.5858 0.00416134L7.94737 0C4.98322 0 3.06766 1.9319 3.06766 4.92203V7.19141H0.414863C0.18563 7.19141 0 7.37409 0 7.59943V10.8875C0 11.1128 0.185842 11.2953 0.414863 11.2953H3.06766V19.5922C3.06766 19.8175 3.25329 20 3.48252 20H6.94366C7.17289 20 7.35852 19.8173 7.35852 19.5922V11.2953H10.4603C10.6895 11.2953 10.8751 11.1128 10.8751 10.8875L10.8764 7.59943C10.8764 7.49124 10.8326 7.38762 10.7549 7.31105C10.6772 7.23448 10.5714 7.19141 10.4613 7.19141H7.35852V5.26763C7.35852 4.34298 7.58267 3.87358 8.808 3.87358L10.5853 3.87295C10.8144 3.87295 11 3.69027 11 3.46514V0.411972C11 0.187052 10.8146 0.00457747 10.5858 0.00416134Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">32k</p>
                <p class="social__descr">likes</p>
              </div>
              <div class="social__item">
                <svg width="15" height="21" viewBox="0 0 15 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M13.0546 2.81768C11.741 1.48274 9.92295 0.747498 7.93556 0.747498C4.89971 0.747498 3.03253 2.06479 2.00076 3.16979C0.72917 4.53159 0 6.33977 0 8.13082C0 10.3796 0.888595 12.1056 2.37667 12.7478C2.47657 12.7911 2.57709 12.8129 2.67563 12.8129C2.98956 12.8129 3.2383 12.5955 3.32448 12.2467C3.3747 12.0466 3.4911 11.553 3.5417 11.3387C3.65004 10.9155 3.56251 10.7119 3.32626 10.4172C2.89588 9.87815 2.69545 9.24072 2.69545 8.41113C2.69545 5.947 4.42882 3.32813 7.64145 3.32813C10.1905 3.32813 11.774 4.86174 11.774 7.33043C11.774 8.88828 11.457 10.331 10.8812 11.393C10.4811 12.1309 9.77756 13.0105 8.69747 13.0105C8.2304 13.0105 7.81085 12.8074 7.5461 12.4534C7.29601 12.1187 7.21359 11.6863 7.31417 11.2356C7.4278 10.7265 7.58273 10.1954 7.73267 9.68196C8.00616 8.74422 8.26469 7.85853 8.26469 7.1519C8.26469 5.94322 7.56272 5.1311 6.51809 5.1311C5.19049 5.1311 4.15041 6.55844 4.15041 8.38057C4.15041 9.27421 4.37477 9.94259 4.47634 10.1992C4.3091 10.9493 3.31512 15.4088 3.12658 16.2497C3.01757 16.7406 2.36085 20.6178 3.44783 20.927C4.66913 21.2743 5.76079 17.4982 5.87189 17.0715C5.96195 16.7244 6.27704 15.4122 6.47014 14.6056C7.0597 15.2067 8.00899 15.6131 8.93267 15.6131C10.674 15.6131 12.24 14.7837 13.3422 13.2777C14.4112 11.817 15 9.78107 15 7.54525C15 5.79734 14.2909 4.07418 13.0546 2.81768Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">814</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0 5.71933C1.75987 4.29489 4.26211 1.16689 6.21375 1.16689C8.16305 1.16689 8.64182 3.50155 8.90775 5.61908C9.17718 7.73661 9.94295 12.369 10.9735 12.369C12.0064 12.369 14.3579 8.27113 14.2239 6.688C14.0921 5.10486 12.3887 5.34231 11.4524 5.7969C12.3135 2.63077 14.3016 0.947388 16.8438 0.947388C19.3871 0.947388 20 2.76902 20 5.00593C20 8.41069 13.1945 18.8421 9.08298 18.8421C6.53964 18.8421 5.90904 15.0413 5.39384 13.16C4.87734 11.2811 3.86334 6.35043 2.6776 6.03422C2.21757 5.95665 0.918894 7.00289 0.918894 7.00289L0 5.71933Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">165</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M9.99972 0.444458C4.48587 0.444458 0 4.97604 0 10.5456C0 16.1152 4.48587 20.6465 9.99972 20.6465C15.5138 20.6465 20 16.1155 20 10.5456C20 4.97604 15.5138 0.444458 9.99972 0.444458ZM16.58 5.21193C17.7206 6.64175 18.4139 8.44752 18.4458 10.4152C18.0663 10.3364 16.4588 10.0333 14.538 10.0333C13.9182 10.0333 13.2659 10.0648 12.6119 10.1464C12.5566 10.0106 12.5014 9.87536 12.4434 9.7387C12.2738 9.33524 12.091 8.9349 11.9018 8.54052C14.8582 7.3086 16.2842 5.59895 16.58 5.21193ZM15.566 4.14503C14.0783 2.82635 12.1305 2.02568 9.99972 2.02568C9.34514 2.02568 8.70767 2.10195 8.09514 2.24541C8.43883 2.71436 9.8831 4.73448 11.2026 7.17393C14.0533 6.08462 15.3305 4.46995 15.566 4.14503ZM6.37082 2.85357C6.66209 3.2593 8.1086 5.30096 9.46204 7.72085C5.82978 8.68653 2.60428 8.74948 1.8258 8.74948H1.7431C2.30237 6.14275 4.04379 3.97661 6.37082 2.85357ZM1.55472 10.3483C1.55248 10.4183 1.55136 10.4886 1.55136 10.5589C1.55136 12.7256 2.35563 14.7052 3.6788 16.213C4.03594 15.6162 6.35681 11.9647 10.5794 10.5853C10.6722 10.5547 10.7656 10.5272 10.8603 10.4997C10.6588 10.0429 10.4421 9.58588 10.2145 9.13564C6.46417 10.2612 2.8249 10.3488 1.77646 10.3488C1.67975 10.3488 1.60518 10.3488 1.55472 10.3483ZM9.99972 19.0916C8.06207 19.0916 6.27383 18.4279 4.84694 17.3151C5.0883 16.8365 6.8401 13.6465 11.4675 12.0177C11.4703 12.0165 11.4734 12.0154 11.4768 12.0146C12.6371 15.0698 13.1285 17.634 13.2633 18.4287C12.2592 18.8557 11.1564 19.0916 9.99972 19.0916ZM13.1658 11.5958C14.2165 14.5269 14.6717 16.93 14.785 17.5875C16.6349 16.2983 17.9525 14.2842 18.334 11.9567C18.013 11.8575 16.6318 11.4665 14.866 11.4665C14.3283 11.4665 13.755 11.5031 13.1658 11.5958Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">6k</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M20 2.62038C19.2644 2.95736 18.473 3.18527 17.6431 3.28706C18.4905 2.76263 19.1407 1.93285 19.4477 0.942477C18.6548 1.42834 17.7762 1.7808 16.842 1.97078C16.0935 1.14732 15.0271 0.63269 13.8462 0.63269C11.5805 0.63269 9.74295 2.53092 9.74295 4.87139C9.74295 5.20363 9.77937 5.527 9.84975 5.83742C6.43961 5.66072 3.41596 3.97333 1.39203 1.40811C1.03889 2.034 0.836317 2.76263 0.836317 3.53931C0.836317 5.00953 1.56125 6.30748 2.66165 7.0674C1.98935 7.04559 1.35622 6.85498 0.803268 6.53666C0.802962 6.55467 0.802962 6.57269 0.802962 6.59039C0.802962 8.64415 2.21794 10.3571 4.09468 10.7463C3.75073 10.8436 3.3875 10.8952 3.01386 10.8952C2.74886 10.8952 2.49212 10.8689 2.24181 10.8196C2.76385 12.5032 4.27889 13.7288 6.07485 13.7632C4.67028 14.9003 2.90125 15.5777 0.978304 15.5777C0.647817 15.5777 0.320389 15.5578 0 15.5183C1.81493 16.7214 3.97228 17.4228 6.28936 17.4228C13.8367 17.4228 17.9641 10.9641 17.9641 5.36231C17.9641 5.17865 17.9602 4.99563 17.9522 4.81418C18.7546 4.21673 19.4501 3.4704 20 2.62038Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">130k</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M8.07247 6.84028C8.07247 6.84028 9.96213 6.69327 9.96213 4.3413C9.96213 1.99587 8.41658 0.845215 6.45439 0.845215H0V13.9792H6.45381C6.45381 13.9792 10.3964 14.1072 10.3964 10.0998C10.3967 10.0998 10.5658 6.84028 8.07247 6.84028ZM10.8855 9.23079C10.8855 9.20499 10.8917 4.18776 15.649 4.18776C20.6724 4.18776 19.966 9.88879 19.966 9.88879H13.5421C13.5421 12.3241 15.7216 12.1705 15.7216 12.1705C17.7862 12.1705 17.714 10.7582 17.714 10.7582H19.8934C19.8934 14.5097 15.649 14.2542 15.649 14.2542C10.5596 14.2542 10.8855 9.23079 10.8855 9.23079ZM15.6975 6.11141C13.7834 6.11141 13.5177 8.13111 13.5177 8.13111H17.5871C17.5871 8.13111 17.6174 6.11141 15.6975 6.11141ZM6.4541 3.17791H2.84389V6.11141H6.23066C6.81641 6.11141 7.32964 5.91311 7.32964 4.54551C7.32964 3.17791 6.4541 3.17791 6.4541 3.17791ZM6.27324 11.6465H2.84389V8.13111H6.4541C6.4541 8.13111 7.76447 8.11837 7.75831 9.93977C7.75831 11.474 6.78647 11.6337 6.27324 11.6465ZM12.9804 3.23572V1.61853H18.1004V3.23572H12.9804Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">37k</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M6.25 0.151489H13.75C17.2013 0.151489 20 2.97851 20 6.46462V14.0404C20 17.5265 17.2013 20.3535 13.75 20.3535H6.25C2.79875 20.3535 0 17.5265 0 14.0404V6.46462C0 2.97851 2.79875 0.151489 6.25 0.151489ZM13.75 18.4596C16.1625 18.4596 18.125 16.4772 18.125 14.0404V6.46462C18.125 4.02775 16.1625 2.04543 13.75 2.04543H6.25C3.8375 2.04543 1.875 4.02775 1.875 6.46462V14.0404C1.875 16.4772 3.8375 18.4596 6.25 18.4596H13.75Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">854k</p>
                <p class="social__descr">followers</p>
              </div>
              <div class="social__item">
                <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M5.049 7.66514H3.87867L3.87687 3.62421L2.40618 0.151489H3.67224L4.4178 2.73135L5.1528 0.158177H6.43251L5.05003 3.62186L5.049 7.66514ZM6.46582 2.96795C6.38223 3.25275 6.33989 3.64772 6.33989 4.15382H6.34009V5.54967C6.34009 6.01193 6.3623 6.35836 6.40927 6.58924C6.45548 6.81985 6.5321 7.01771 6.64204 7.18021C6.75018 7.34243 6.90246 7.46473 7.09909 7.54573C7.29497 7.6275 7.53346 7.66645 7.81575 7.66645C8.06921 7.66645 8.29294 7.62005 8.48854 7.52485C8.68262 7.43095 8.84263 7.28369 8.96649 7.08659C9.09195 6.88769 9.17292 6.67542 9.21037 6.44633C9.2483 6.21772 9.26789 5.85812 9.26789 5.36905V4.03565C9.26789 3.64951 9.24775 3.36237 9.20595 3.1725C9.16492 2.98498 9.08905 2.8016 8.97601 2.62332C8.86608 2.44558 8.70634 2.30191 8.50068 2.19098C8.29501 2.08082 8.04907 2.02435 7.76237 2.02435C7.42173 2.02435 7.14089 2.11074 6.92157 2.28385C6.70218 2.45565 6.54997 2.68392 6.46582 2.96795ZM10.0978 7.13119C10.1548 7.271 10.2439 7.38372 10.3654 7.46935C10.4844 7.5529 10.6377 7.59551 10.8206 7.59551C10.9809 7.59551 11.123 7.55215 11.2464 7.46266C11.37 7.37366 11.4743 7.24108 11.5589 7.06363L11.5377 7.5001H12.7777V2.22835H11.8015V6.33126C11.8015 6.55312 11.618 6.73498 11.3942 6.73498C11.172 6.73498 10.988 6.55312 10.988 6.33126V2.22835H9.96937V5.78387C9.96937 6.23688 9.97737 6.53891 9.99102 6.69217C10.0056 6.84432 10.0405 6.99007 10.0978 7.13119ZM16 16.8747V11.2145C16 9.85679 14.8222 8.74525 13.3822 8.74525H2.61806C1.17757 8.74525 0 9.85651 0 11.2145V16.8747C0 18.2323 1.1775 19.3434 2.61806 19.3434H13.3819C14.8222 19.3434 16 18.2326 16 16.8747ZM9.58114 12.8786C9.31458 12.8786 9.09574 13.0584 9.09574 13.2781V16.2537C9.09574 16.4735 9.31458 16.6523 9.58114 16.6523C9.84978 16.6523 10.0686 16.4735 10.0686 16.2537V13.2779C10.0686 13.0584 9.84978 12.8786 9.58114 12.8786ZM13.5344 14.1898H12.48L12.4851 13.578C12.4851 13.3058 12.7084 13.0837 12.9816 13.0837H13.0492C13.3226 13.0837 13.5468 13.3059 13.5468 13.578L13.5344 14.1898ZM3.33574 17.4892L3.33526 11.5269L4.66946 11.5274V10.6436L1.11254 10.6382V11.5065L2.223 11.5099V17.4892H3.33574ZM6.22319 12.4153H7.33545V17.4876L6.44231 17.4863L6.44437 16.829C6.20436 17.3442 5.24494 17.7587 4.74478 17.3978C4.5088 17.2293 4.48743 16.949 4.46748 16.6875L4.46748 16.6874L4.46747 16.6873L4.46747 16.6872C4.46467 16.6505 4.46189 16.6141 4.45856 16.5785C4.44897 16.4714 4.45057 16.2806 4.45271 16.0265C4.45385 15.8913 4.45514 15.7381 4.45497 15.5701L4.45083 12.415H5.55716L5.56233 15.6207C5.56252 15.7872 5.5592 15.9272 5.55649 16.0414C5.55208 16.2277 5.54929 16.3455 5.56592 16.398C5.72413 16.8801 6.13084 16.618 6.22167 16.3711C6.23922 16.3223 6.23616 16.2192 6.23097 16.044C6.22754 15.9287 6.22319 15.782 6.22319 15.5991V12.4153ZM10.8947 16.061L10.8927 13.411C10.8916 12.4008 10.136 11.7959 9.1094 12.6131L9.11402 10.6428L8.00252 10.6446L7.99707 17.4448L8.9109 17.4313L8.99401 17.0075C10.1623 18.0796 10.8967 17.3455 10.8947 16.061ZM13.5424 15.7144L14.377 15.71C14.7571 17.9692 11.5657 18.3404 11.565 15.7139V14.1339C11.565 13.6597 11.6119 13.287 11.7066 13.0138C11.801 12.7403 11.9624 12.5371 12.174 12.3851C12.848 11.8989 14.1817 12.0495 14.3182 12.9996C14.3616 13.2999 14.3752 13.8249 14.3752 14.3498V15.0685H12.465V15.7289V16.2412V16.2927C12.465 16.5417 12.6707 16.7445 12.9212 16.7445H13.0846C13.3347 16.7445 13.5404 16.5417 13.5404 16.2927V15.8274C13.5406 15.8095 13.541 15.7922 13.5414 15.7758C13.5419 15.7539 13.5424 15.7334 13.5424 15.7144ZM7.31069 6.24819C7.31069 6.54636 7.53339 6.79014 7.80409 6.79014C8.0748 6.79014 8.29598 6.54664 8.29598 6.24819V3.44158C8.29598 3.14341 8.0748 2.89963 7.80409 2.89963C7.53339 2.89963 7.31069 3.14313 7.31069 3.44158V6.24819Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">62k</p>
                <p class="social__descr">subscribers</p>
              </div>
              <div class="social__item">
                <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="M0.0040739 7.31966C-0.125839 3.84433 2.8702 0.632711 6.29412 0.591044C8.0392 0.439816 9.73697 1.12835 11.0576 2.25134C10.5159 2.85655 9.96467 3.45476 9.37591 4.01479C8.21328 3.29712 6.81349 2.75019 5.4547 3.23593C3.26309 3.86998 1.93585 6.49912 2.74688 8.6775C3.41853 10.9526 6.14212 12.2012 8.27666 11.2455C9.38193 10.8434 10.1106 9.8072 10.4304 8.69382C9.16368 8.66818 7.89667 8.68421 6.62994 8.64866C6.62679 7.8829 6.62363 7.12006 6.62679 6.35431C8.73924 6.3511 10.8549 6.34469 12.9705 6.36392C13.1004 8.24014 12.8279 10.2481 11.6274 11.7539C9.9836 13.9035 6.94655 14.5343 4.4759 13.691C1.85383 12.816 -0.0529962 10.1321 0.0040739 7.31966Z"
                    fill="#currentColor" />
                </svg>
                <p class="social__descr">642</p>
                <p class="social__descr">followers</p>
              </div>
            </div>
          </div>
          <div class="aside__item tags">
            <a data-btn="btn3" class="btn aside__button filters-btn">Tags</a>
            <div id="btn3" class="tags__content filters-menu">
              <a href="#" class="tags__tag">Business</a>
              <a href="#" class="tags__tag">Freelance</a>
              <a href="#" class="tags__tag">Money</a>
              <a href="#" class="tags__tag">Experience</a>
              <a href="#" class="tags__tag">Lifestyle</a>
              <a href="#" class="tags__tag">SEO</a>
              <a href="#" class="tags__tag">Wordpress</a>
              <a href="#" class="tags__tag">Marketing</a>
              <a href="#" class="tags__tag">UX</a>
              <a href="#" class="tags__tag">Modern</a>
              <a href="#" class="tags__tag">Success</a>
              <a href="#" class="tags__tag">Nature</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="follow">
    <div class="container follow__container">
      <h1 class="follow__title">Follow our @instagram_name</h1>
      <ul class="list-reset follow__list">

    
      <li class="follow__item">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/follow2.webp" type="image/webp">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/follow2.png" width="296"
              height="296" alt="">
          </picture>
        </li>
        <li class="follow__item">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/follow3.webp" type="image/webp">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/follow3.png" width="296"
              height="296" alt="">
          </picture>
        </li>
        <li class="follow__item">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/follow4.webp" type="image/webp">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/follow4.png" width="296"
              height="296" alt="">
          </picture>
        </li>
        <li class="follow__item">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/follow5.webp" type="image/webp">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/follow5.png" width="296"
              height="296" alt="">
          </picture>
        </li>
        <li class="follow__item">
          <picture>
            <source srcset="<?php echo get_template_directory_uri(); ?>/assets/img/follow6.webp" type="image/webp">
            <img loading="lazy" src="<?php echo get_template_directory_uri(); ?>/assets/img/follow6.png" width="296"
              height="296" alt="">
          </picture>
        </li>
      </ul>
    </div>
  </section>
</main>
</div>



<?php 

get_footer();

?>