<header>


    <div class="menu-style">
        <?php wp_nav_menu(array('theme_location' => "my-custom-menu")); ?>
    </div>

    <div class="searchwrapper">
        <?php get_search_form(); ?>
    </div>

</header>