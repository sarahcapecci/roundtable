<header class="header" role="banner">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/youth_logo.png" alt=""></a>
    <nav role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-navbar'));
        endif;
      ?>
    </nav>
    <img class="transparency" src="<?php echo get_template_directory_uri(); ?>/assets/img/top_transparency.png" alt="">
</header>
