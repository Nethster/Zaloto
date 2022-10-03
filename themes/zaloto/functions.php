<?php
add_action('wp_enqueue_scripts', 'zaloto_enqueue');

function zaloto_enqueue()
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
  'my-custom-menu', __('My Custom Menu'),
  'footer-menu' => __('Footer Menu', 'zaloto'),
));


//free shipping if you order

add_action('woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice');

function bbloomer_free_shipping_cart_notice()
{

  $min_amount = 600;

  $current = WC()->cart->subtotal;

  if ($current < $min_amount) {
    $added_text = 'Get free shipping if you order ' . wc_price($min_amount - $current) . ' more!';
    $return_to = wc_get_page_permalink('shop');
    $notice = sprintf('<a href="%s" class="button wc-forward">%s</a> %s', esc_url($return_to), 'Continue Shopping', $added_text);
    wc_print_notice($notice, 'notice');
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
    acf_register_block_type(array(
      'name'              => 'stores',
      'title'             => __('Store'),
      'description'       => __('A custom store block.'),
      'render_template'   => 'template-parts/blocks/stores.php',
      'category'          => 'formatting',
      'icon'              => 'store',
      'keywords'          => array('store'),
    ));
    acf_register_block_type(array(
      'name'              => 'mini hero',
      'title'             => __('Mini hero'),
      'description'       => __('A custom mini hero block.'),
      'render_template'   => 'template-parts/blocks/mini-hero.php',
      'category'          => 'formatting',
      'icon'              => 'welcome-view-site',
      'keywords'          => array('hero'),
    ));
    acf_register_block_type(array(
      'name'              => 'product category',
      'title'             => __('Product category'),
      'description'       => __('A custom product category block.'),
      'render_template'   => 'template-parts/blocks/product-category.php',
      'category'          => 'formatting',
      'icon'              => 'welcome-view-site',
      'keywords'          => array('product-category'),
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


function add_woocommerce_support()
{
  add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'add_woocommerce_support');


//custom post type for stores

// unset custom post wysiwyg fields so only title and custom fields remain
function remove_post_custom_fields()
{
  remove_post_type_support('stores', 'editor');
}
add_action('admin_init', 'remove_post_custom_fields');








function custom_post_type()
{

  $labels = array(
    'name'                  => _x('Stores', 'Post Type General Name', 'text_domain'),
    'singular_name'         => _x('Store', 'Post Type Singular Name', 'text_domain'),
    'menu_name'             => __('Stores', 'text_domain'),
    'name_admin_bar'        => __('Post Type', 'text_domain'),
    'archives'              => __('Store Archives', 'text_domain'),
    'attributes'            => __('Store Attributes', 'text_domain'),
    'parent_item_colon'     => __('Parent Item:', 'text_domain'),
    'all_items'             => __('All Stores', 'text_domain'),
    'add_new_item'          => __('Add New Store', 'text_domain'),
    'add_new'               => __('Add New Store', 'text_domain'),
    'new_item'              => __('New Store', 'text_domain'),
    'edit_item'             => __('Edit Store', 'text_domain'),
    'update_item'           => __('Update Store', 'text_domain'),
    'view_item'             => __('View Store', 'text_domain'),
    'view_items'            => __('View Stores', 'text_domain'),
    'search_items'          => __('Search Storee', 'text_domain'),
    'not_found'             => __('Not found', 'text_domain'),
    'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
    'featured_image'        => __('Featured Image', 'text_domain'),
    'set_featured_image'    => __('Set featured image', 'text_domain'),
    'remove_featured_image' => __('Remove featured image', 'text_domain'),
    'use_featured_image'    => __('Use as featured image', 'text_domain'),
    'insert_into_item'      => __('Insert into Store', 'text_domain'),
    'uploaded_to_this_item' => __('Uploaded to this store', 'text_domain'),
    'items_list'            => __('Stores List', 'text_domain'),
    'items_list_navigation' => __('Stores list navigation', 'text_domain'),
    'filter_items_list'     => __('Filter Stores list', 'text_domain'),
  );
  $args = array(
    'label'                 => __('Store', 'text_domain'),
    'description'           => __('Adds a new store to storepage', 'text_domain'),
    'labels'                => $labels,
    'supports'              => array('title', 'editor', 'custom-fields'),
    'taxonomies'            => array('category', 'post_tag'),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 25,
    'menu_icon'             => 'dashicons-store',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => true,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type('stores', $args);
}
add_action('init', 'custom_post_type', 0);
  /* Custom Post Type End */