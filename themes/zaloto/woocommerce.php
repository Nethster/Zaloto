<?php
get_header();
?>


<div class="other_categories_header">
<?php if (is_product_category()){
    $current_category_object = get_queried_object();?>
   <h1><?php echo  $current_category_object->name;?></h1>
   <p><?php echo  $current_category_object->description;?></p>
<?php
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