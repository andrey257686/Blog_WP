<?php

function blog_assets()
{

  wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');

  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');

  wp_enqueue_style('adaptive', get_template_directory_uri() . '/assets/css/media.css');

  wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/script.js', array(), '1', true);
}

add_action('wp_enqueue_scripts', 'blog_assets');

show_admin_bar(false);

add_theme_support('post-thumbnails');

add_theme_support('menus');

function custom_pagination()
{
  ob_start();
?>
  <?php
  global $wp_query;
  $current = max(1, absint(get_query_var('paged')));
  $pagination = paginate_links(array(
    'base' => str_replace(PHP_INT_MAX, '%#%', esc_url(get_pagenum_link(PHP_INT_MAX))),
    'format' => '?paged=%#%',
    'current' => $current,
    'total' => $wp_query->max_num_pages,
    'type' => 'array',
    'prev_text' => null,
    'next_text' => null,
  )); ?>
  <?php if (!empty($pagination)) : ?>
    <ul class="pagination list-reset">
      <?php foreach ($pagination as $key => $page_link) : ?>
        <li class="pagination__item<?php if (strpos($page_link, 'current') !== false) {
                                      echo ' pagination__item--current';
                                    } ?>"><?php echo $page_link ?></li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
<?php
  $links = ob_get_clean();
  return apply_filters('custom_pagination', $links);
}

function posts_link_next_class($format)
{
  $format = str_replace('href=', 'class="post-links__link post-links__link--next" href=', $format);
  return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_previous_class($format)
{
  $format = str_replace('href=', 'class="post-links__link post-links__link--prev" href=', $format);
  return $format;
}
add_filter('previous_post_link', 'posts_link_previous_class');

function blog_theme_widgets_init()
{
  register_sidebar(array(
    'name'          => esc_html__('phone', 'blog-theme'),
    'id'            => "sidebar-1",
    'description'   => esc_html__('Add widgets here.', 'blog-theme'),
    'before_widget' => null,
    'after_widget'  => null
  ));
}

add_action('widgets_init', 'blog_theme_widgets_init');

add_action('wp_ajax_callback_mail', 'callback_mail');
add_action('wp_ajax_nopriv_callback_mail', 'callback_mail');

function callback_mail()
{
  $name = $_POST['name'];
  $phone = $_POST['tel'];
  $msg = $_POST['msg'];

  $to = 'ushakov.andrey257686@gmail.com';
  $subject = 'asd';
  $message = 'asd' . $name . $phone . $msg;

  remove_all_filters('wp_mail_from');
  remove_all_filters('wp_mail_from_name');

  $headers = array(
    'From: Me Myself <me@example.net>',
    'content-type: text/html',
    'Cc: John Q Codex <jqc@wordpress.org>',
    'Cc: iluvwp@wordpress.org', // тут можно использовать только простой email адрес
  );

  wp_mail($to, $subject, $message, $headers);
  wp_die();
}
