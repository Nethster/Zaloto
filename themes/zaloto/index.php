<?php
get_header();
?>


<!--To get the content of a page in postpage  -->

<?php
$my_id = 12;
$post_id_12 = get_post($my_id);
$content = $post_id_12->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?>



<?php
get_footer();
?>