<header class="header" role="banner">
    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/youth_logo.png" alt=""></a>
    <nav class="tablet-hide" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'main-navbar'));
        endif;
      ?>
      <button class="connect" data-toggle="modal" data-target="#myModal" type="button">connect</button>
    </nav>
    <nav class="tablet-show" role="navigation">
      <ul class="mobile-nav">
        <li class="active menu-updates"><a href="http://localhost:8888/roundtable/">updates</a></li>
        <li class="dropdown"><a id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fa fa-bars font-lg gray-txt pointer"></a></i>
          <ul id="mobile-dropdown" class="mobile-dropdown dropdown-menu">
            <li class="menu-about"><a href="http://localhost:8888/roundtable/about/">about</a></li>
            <li class="menu-team"><a href="http://localhost:8888/roundtable/team/">team</a></li>
            <li class="menu-members"><a href="http://localhost:8888/roundtable/members/">members</a></li>
            <li><button data-toggle="modal" data-target="#myModal">connect</button></li>
          </ul>
        </li>
      </ul>
    </nav>
    <img class="tablet-hide transparency" src="<?php echo get_template_directory_uri(); ?>/assets/img/top_transparency.png" alt="">
</header>
