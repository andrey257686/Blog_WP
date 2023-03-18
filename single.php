
<?php get_header(); ?>

<?php if ( have_posts()) { while (have_posts()) {the_post(); ?>

  <main class="main">
      <div class="post-banner">
        <div
          class="container post-banner__container"
          style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')"
        ></div>
      </div>
      <section class="post-content">
        <div class="container post-content__container">
          <div class="post-wrapper">
            <div class="post">
              <div class="post-meta">
                <?php
                  $category = get_the_category();
                  $cat_link = get_category_link( $category[0] );
                ?>
                <a href="<?php echo $cat_link; ?>" class="post-category">
                  <?php echo $category[0]->cat_name; ?>
                </a>
                <time class="post-date"><?php the_date(' j M Y '); ?></time>
              </div>
              <h1 class="post-title">
                <?php the_title(); ?>
              </h1>
              <?php the_content('', true); ?>
              <img src="img/post-img.jpg" alt="" />
            </div>
            <div class="post-links">
              <?php previous_post_link(' %link', 'Предыдущая новость')?>
              <!-- <a href="#" class="post-links__link post-links__link--prev">
                <svg
                  width="10"
                  height="11"
                  viewBox="0 0 10 11"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_2_655)">
                    <path
                      d="M2.41344 5.22558L7.03874 0.613083C7.19028 0.462049 7.43563 0.462303 7.58692 0.613865C7.73809 0.765407 7.7377 1.01089 7.58614 1.16205L3.23616 5.50002L7.58629 9.83797C7.73784 9.98914 7.73823 10.2345 7.58708 10.386C7.51124 10.462 7.41188 10.5 7.31253 10.5C7.21342 10.5 7.11446 10.4623 7.03876 10.3868L2.41344 5.77443C2.34046 5.70181 2.2995 5.60299 2.2995 5.50002C2.2995 5.39705 2.34057 5.29834 2.41344 5.22558Z"
                      fill="#5D71DD"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_2_655">
                      <rect
                        width="10"
                        height="10"
                        fill="white"
                        transform="matrix(-1 0 0 1 10 0.5)"
                      />
                    </clipPath>
                  </defs>
                </svg>
                <span>Предыдущая новость</span>
              </a> -->
              <?php next_post_link(' %link', 'Следующая новость')?>
              <!-- <a href="#" class="post-links__link post-links__link--next">
                <span>Следующая новость</span>
                <svg
                  width="10"
                  height="11"
                  viewBox="0 0 10 11"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g clip-path="url(#clip0_2_649)">
                    <path
                      d="M7.58656 5.22558L2.96126 0.613083C2.80972 0.462049 2.56437 0.462303 2.41308 0.613865C2.26191 0.765407 2.2623 1.01089 2.41386 1.16205L6.76384 5.50002L2.41371 9.83797C2.26216 9.98914 2.26177 10.2345 2.41292 10.386C2.48876 10.462 2.58812 10.5 2.68747 10.5C2.78658 10.5 2.88554 10.4623 2.96124 10.3868L7.58656 5.77443C7.65954 5.70181 7.7005 5.60299 7.7005 5.50002C7.7005 5.39705 7.65943 5.29834 7.58656 5.22558Z"
                      fill="#5D71DD"
                    />
                  </g>
                  <defs>
                    <clipPath id="clip0_2_649">
                      <rect
                        width="10"
                        height="10"
                        fill="white"
                        transform="translate(0 0.5)"
                      />
                    </clipPath>
                  </defs>
                </svg>
              </a> -->
            </div>
          </div>
          <?php get_sidebar(); ?>
        </div>
      </section>
    </main>
    
<?php } } else { ?>
<?php } ?>

<?php get_footer(); ?>