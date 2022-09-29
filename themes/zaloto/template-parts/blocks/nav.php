<header>

    <div class="header-container">


        <div class="menu-wrapper">
            <?php wp_nav_menu(array('theme_location' => "my-custom-menu")); ?>
        </div>

        <?php
        $site_title = get_bloginfo('name');
        $site_url = network_site_url('/')
        ?>

        <div class="zaloto-logo">
            <a href="<?php echo $site_url ?>" class="logo">
                <h2><?php echo $site_title; ?></h2>
            </a>
        </div>

    <div class="cart-menu">
        <a href="http://localhost/zaloto/my-account/">My account</a>
        <div class="cart-icons">
            <a href="http://localhost/zaloto/cart/"><svg width="28" height="37" viewBox="0 0 28 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.67725 37.3055H22.3228C25.3562 37.3055 27.8428 34.9651 27.8428 32.0499V8.892C27.8428 8.4814 27.4753 8.15292 27.0481 8.15292H21.605V6.60907C21.605 2.78227 18.2981 -0.330078 14.2136 -0.330078C10.1292 -0.330078 6.82227 2.78227 6.82227 6.60907V8.15292H0.951905C0.524658 8.15292 0.157227 8.4814 0.157227 8.892V32.0499C0.157227 34.9651 2.65234 37.3055 5.67725 37.3055ZM8.36035 6.60907C8.36035 3.59526 10.9836 1.14808 14.2136 1.14808C17.4436 1.14808 20.0669 3.59526 20.0669 6.60907V8.15292H8.36035V6.60907ZM1.69531 9.63108H6.82227V16.948C6.82227 17.3586 7.16406 17.6871 7.59131 17.6871C8.01855 17.6871 8.36035 17.3586 8.36035 16.948V9.63108H20.0669V16.948C20.0669 17.3586 20.4087 17.6871 20.8359 17.6871C21.2632 17.6871 21.605 17.3586 21.605 16.948V9.63108H26.3047V32.0499C26.3047 34.1439 24.5017 35.8274 22.3228 35.8274H5.67725C3.49829 35.8274 1.69531 34.1521 1.69531 32.0499V9.63108Z" fill="white" />
                </svg></a>

            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M35.7071 34.2929C36.0976 34.6834 36.0976 35.3166 35.7071 35.7071C35.3166 36.0976 34.6834 36.0976 34.2929 35.7071L23.5248 24.939C23.3273 24.7416 22.992 24.7265 22.7814 24.8984C22.7814 24.8984 22.6176 25.04 22.3298 25.2534C20.0021 26.9792 17.1202 28 14 28C6.26801 28 0 21.732 0 14C0 6.26801 6.26801 0 14 0C21.732 0 28 6.26801 28 14C28 17.0491 27.0252 19.8706 25.3703 22.1698C25.1223 22.5143 24.8986 22.7783 24.8986 22.7783C24.7234 22.9931 24.7387 23.3245 24.939 23.5248L35.7071 34.2929ZM14 26C20.6274 26 26 20.6274 26 14C26 7.37258 20.6274 2 14 2C7.37258 2 2 7.37258 2 14C2 20.6274 7.37258 26 14 26Z" fill="white" />
            </svg>
        </div>


    </div>

        </div>

    </div>


</header>