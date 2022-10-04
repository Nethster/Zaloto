byyye
<?php


$terms = get_term('categories');
if( $terms ): ?>
    <ul>
    <?php foreach( $terms as $term ): ?>
        <li>
            <h2><?php echo esc_html( $term->name ); ?></h2>
            <p><?php echo esc_html( $term->description ); ?></p>
     <?php  $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id); ?>
            echo "<img src='{$image}' alt='' width='260' height='365' />";
            <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">View collection '<?php echo esc_html( $term->name ); ?>' posts</a>
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>
HEHH
<?php
var_dump($term);

