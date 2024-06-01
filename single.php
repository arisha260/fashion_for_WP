<?php get_header();?>

<main class="main">
<?php if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>
	<section class="blog-info">
        <div class="container blog-info__container">
          <div class="blog-info__left">
            <h1 class="blog-info__title"><?php the_title();?></h1>
              <img loading="lazy" src="<?php echo get_the_post_thumbnail_url(); ?>" class="blog-info__image" width="" height="" alt="">
<!-- исправить!-->              <p class="blog-info__descr"><?php echo get_post_field('post_content', $post_id); ?></p>
          </div>
          <div class="blog-info__right aside">
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
            <div class="aside__item tags">
              <a data-btn="btn3" class="btn aside__button filters-btn">Tags</a>
              <div id="btn3" class="tags__content filters-menu">
              <?php
                $posttags = get_the_tags();
                if ($posttags) {
                    foreach($posttags as $tag) {
                        echo '<a href="' . get_tag_link($tag->term_id) . '" class="tags__tag">' . $tag->name . '</a>';
                    }
                }
                ?>
                <!-- <a href="#" class="tags__tag"><?php the_tags();?></a> -->
              </div>
            </div>
          </div>
        </div>
      </section>
<?php } } else { ?>
<?php } ?> 
    </main>

<?php get_footer();?>