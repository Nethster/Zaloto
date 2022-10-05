<?php
get_header();
?>


<div class="categories-header">
<?php if (is_product_category()){
    $current_category_object = get_queried_object();
   echo  $current_category_object->name;
   echo  $current_category_object->description;

}?>
</div>
<?php

woocommerce_content(); 

if (is_product_category()){
    get_template_part("/template-parts/blocks/categories");
}


?>


<?php
get_footer();
?>