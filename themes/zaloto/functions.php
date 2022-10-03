<?php
add_action('wp_enqueue_scripts', 'anotheremptytheme_enqueue');

function anotheremptytheme_enqueue()
{
  wp_enqueue_style('style', get_stylesheet_uri());
}


// Add support for post thumbnails
add_theme_support('post-thumbnails');

// Add support for post formats
add_theme_support('post-formats', array('aside', 'gallery', 'link'));

// Add support for custom background
add_theme_support('custom-background', array(
  'default-color' => 'e8e8e8',
));


// Add support for custom logo
add_theme_support('custom-logo', array(
  'height' => 50,
  'width' => 50,
  'flex-height' => true,
  'flex-width' => true,
));



//nav menus
register_nav_menus(array(
  'main-menu' => __('Main Menu', 'zaloto'),
  'footer-menu' => __('Footer Menu', 'zaloto'),
));

function wpb_custom_new_menu()
{
  register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');


//free shipping if you order

add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice' );
  
function bbloomer_free_shipping_cart_notice() {
  
 $min_amount = 600; 
   
   $current = WC()->cart->subtotal;
  
   if ( $current < $min_amount ) {
      $added_text = 'Get free shipping if you order ' . wc_price( $min_amount - $current ) . ' more!';
      $return_to = wc_get_page_permalink( 'shop' );
      $notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), 'Continue Shopping', $added_text );
      wc_print_notice( $notice, 'notice' );
   }
  
}

// ACF blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{

  // Check function exists.
  if (function_exists('acf_register_block_type')) {

    // register a testimonial block.
    acf_register_block_type(array(
      'name'              => 'hero',
      'title'             => __('Hero'),
      'description'       => __('A custom hero block.'),
      'render_template'   => 'template-parts/blocks/hero.php',
      'category'          => 'formatting',
      'icon'              => 'welcome-view-site',
      'keywords'          => array('hero'),
    ));

    acf_register_block_type(array(
      'name'              => 'heading',
      'title'             => __('Heading'),
      'description'       => __('A custom heading block.'),
      'render_template'   => 'template-parts/blocks/heading.php',
      'category'          => 'formatting',
      'icon'              => 'admin-customizer',
      'keywords'          => array('heading'),
    ));

    acf_register_block_type(array(
      'name'              => 'postblock',
      'title'             => ('postblock'),
      'description'       => ('A custom postblock.'),
      'render_template'   => 'template-parts/blocks/postblock.php',
      'category'          => 'formatting',
      'icon'              => 'admin-customizer',
      'keywords'          => array('postblock'),
    ));

    acf_register_block_type(array(
      'name'              => 'highlight',
      'title'             => ('Highlight'),
      'description'       => ('A custom highlight block.'),
      'render_template'   => 'template-parts/blocks/highlight.php',
      'category'          => 'formatting',
      'icon'              => 'welcome-view-site',
      'keywords'          => array('highlight'),
    ));
    acf_register_block_type(array(
      'name'              => 'collections',
      'title'             => ('collections'),
      'description'       => ('A custom collections block.'),
      'render_template'   => 'template-parts/blocks/collections.php',
      'category'          => 'formatting',
      'icon'              => 'welcome-view-site',
      'keywords'          => array('collections'),
    ));
  }
}

// ACF options page

if (function_exists('acf_add_options_page')) {

  acf_add_options_page();
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
  return 10;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);


/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
  while (@ob_end_flush());
});

/*Google fonts*/
function google_fonts()
{
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Montserrat&display=swap', false);
}
add_action('wp_enqueue_scripts', 'google_fonts');


//adding woocommerce support


function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce', array(
    'thumbnail_image_width' => 150,
    'single_image_width'    => 300,

    'product_grid'          => array(
      'default_rows'    => 3,
      'min_rows'        => 2,
      'max_rows'        => 8,
      'default_columns' => 4,
      'min_columns'     => 2,
      'max_columns'     => 5,
    ),
  ));
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');
