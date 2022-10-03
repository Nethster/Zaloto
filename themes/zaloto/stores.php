<?php
/*Template Name: Stores*/

get_header();

query_posts(array(
    'post_type' => 'stores'
)); ?>


<div class="stores">

    <?php
    while (have_posts()) : the_post(); ?>
        <div class="single-store">
            <h2><?php the_field('city'); ?></h2>
            <p><?php the_field('street'); ?></p>
            <p><?php the_field('zip_code') ?> <?php the_field('city'); ?></p>
            <br>

            <h3>Öppettider</h3>
            <p>Måndag-Torsdag: <?php the_field('monday-thursday') ?></p>
            <p>Fredag: <?php the_field('friday') ?></p>
            <p>Lördag: <?php the_field('saturday') ?></p>
            <p>Söndag: <?php the_field('sunday') ?></p>


            </p>
        </div>
    <?php endwhile; ?>

</div>




<?php get_footer(); ?>