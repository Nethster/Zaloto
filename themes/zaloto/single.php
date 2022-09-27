<?php
get_header();
?>


<div class="single-page-content">
<p><?php the_time(get_option('date_format'));?></p>
<h1><?php the_title(); ?></h1>
<?php the_post_thumbnail('medium'); ?>

</div>

<div class="single-page-text">

<?php the_content(); ?>
<a class="page-link" href="http://localhost/zaloto/news/"> Back</a>
</div>



<?php
get_footer();
?>