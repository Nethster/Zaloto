<?php

$args = array(
    'post_type' => 'stores',
    'post_status' => 'publish',
    'posts_per_page' => 10,
);

$loop = new WP_Query($args);

while ($loop->have_posts()) : $loop->the_post();
    echo the_field('city');
    the_field('address');
endwhile;

wp_reset_postdata();
