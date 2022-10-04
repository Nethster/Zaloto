<div class="suggestions-container">

    <div class="suggestions-image">
        <?php
        $image = get_field('product_image');

        if ($image) {
            $image_id = $image['id'];
            echo wp_get_attachment_image($image_id, 'large');
        }
        ?>
    </div>

    <h2 class="suggestions-heading"><?php the_field('product_title'); ?></h2>
    <p><?php the_field('product_description'); ?></p>
<<<<<<< HEAD:themes/zaloto/template-parts/blocks/product-category.php
    <small class="product_price"><?php the_field('product_price'); ?></small>

=======
    <small class="product_price"><?php the_field('product_price'); ?> SEK</small>
>>>>>>> 8c946af820aa6090e16617b7baf7f3200c5aecd0:themes/zaloto/template-parts/blocks/suggestions.php
</div>