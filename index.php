<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/home.css" type="text/css" media="screen" />

<?php
	get_header();

?>
    <img id="signature" src="<?php bloginfo("template_url"); ?>/image/signature.png" />
    <div id="mini-bio" style="text-align:center">
    	<?php
        if(have_posts()):
          while(have_posts()) :
            the_post();
            the_content();
          endwhile;
        else : echo '<p>No Content Found</p>';
        endif;
      ?>
    </div>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
