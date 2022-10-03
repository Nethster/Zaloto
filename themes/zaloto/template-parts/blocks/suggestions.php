<!-- <div class="product-category-block">
    <div class="product-category-image">
        <?php
        $image = get_field('product_image');

        if ($image) {
            $image_id = $image['id'];
            echo wp_get_attachment_image($image_id, 'large');
        }
        ?>
    </div>
    <h2><?php the_field('product_title'); ?></h2>
    <p><?php the_field('product_description'); ?></p>
    <small class="product_price"><?php the_field('product_price'); ?></small>
</div>
 -->



<div class="product-category-container">

    <div class="product-category-image">
        <?php
        $image = get_field('product_image');

        if ($image) {
            $image_id = $image['id'];
            echo wp_get_attachment_image($image_id, 'large');
        }
        ?>
    </div>

    <h2 class="product-category-heading"><?php the_field('product_title'); ?></h2>
    <p><?php the_field('product_description'); ?></p>
    <small class="product_price"><?php the_field('product_price'); ?></small>
</div>