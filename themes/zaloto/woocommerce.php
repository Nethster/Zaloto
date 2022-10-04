<?php
get_header();
?>

<?php
 woocommerce_content(); 

if (is_product_category()){
    get_template_part("/template-parts/blocks/categories");
}
?>


<?php
get_footer();
?>