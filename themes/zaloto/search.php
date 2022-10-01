<?php  /* Template Name: Search */
get_header();


?>
<div class="search-content-container">

    <div class="search-field">
        <?php get_search_form(); ?>
    </div>


    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <div class="search-result">
                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail') ?>
                        <?php the_title(); ?></a>
                </h2>
                <p><?php the_excerpt(); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <div class="search-result">
            <h2><?php _e('Sorry, no posts matched your criteria.'); ?></h2>
        </div>
    <?php endif; ?>

</div>



<?php
get_footer();
?>