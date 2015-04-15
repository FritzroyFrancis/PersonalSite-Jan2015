<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/blog.css" type="text/css" media="screen" />

<?php get_header(); ?>
<ul id="blogList">
  <?php
    query_posts('cat=2&post_per_page=-1');
    
    if(have_posts()):
      while(have_posts()) : the_post();
        echo "<li><div class='padding-8'><span class='blogTitle'>";
        echo the_title();
        echo "</span><div class='blogPost'>";
        echo the_content();
        echo "</span></div></li>";            
      endwhile;
    else : echo '<p>No Content Found</p>';
    endif;
    ?>
</ul>
<!-- end .content --></div>
<!-- end .container --></div>
</body>
</html>
