<?php
/*Template Name: Stores*/

get_header();

query_posts(array(
    'post_type' => 'stores'
)); ?>



<?php
while (have_posts()) : the_post(); ?>
    <div class="store">
        <h2><?php the_field('city'); ?></h2>
        <p><?php the_field('address'); ?></p>
    </div>
<?php endwhile; ?>





<?php get_footer(); ?>