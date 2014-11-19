<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

  <div role="document">
    <div>
      <main class="" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main --> 
    </div><!-- /.content -->
  </div><!-- /.wrap -->

  <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  <div id="myModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content blue-bg">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="left inline-block vertical-al-top">
              <h3 class="margin-top-none white-txt">Connecting with RYR</h3>
              <p class="white-txt">Fill out the form to the right and the appropriate Regional Youth Roundtable team member will reply via email.</p>
              <h3 class="white-txt">Let's Get Social</h3>
              <ul>
                <li><a href="http://www.twitter.com/youthroundtable"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/popup_twitter.png" alt=""></a></li>
                <li><a href="http://www.facebook.com/youthroundtable "><img src="<?php echo get_template_directory_uri(); ?>/assets/img/popup_facebook.png" alt=""></a></li>
                <li><a href="http://plus.google.com/112398631688644928178"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/popup_google_plus.png" alt=""></a></li>
                <li><a href="http://www.linkedin.com/company/5356636"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/popup_linkedin.png" alt=""></a></li>
                <li><a href="http://"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/popup_youtube.png" alt=""></a></li>
              </ul>
            </div>
            <div class="right inline-block vertical-al-top">
              <?php echo do_shortcode('[contact-form-7 id="86" title="Connect"]'); ?>
            </div>
        </div>
      </div>
  </div>
</body>
</html>
