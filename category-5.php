<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/projects.css" type="text/css" media="screen" />

<?php
	get_header();
?>

<div id="projects-carousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#projects-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#projects-carousel" data-slide-to="1"></li>
    <li data-target="#projects-carousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  <?php
    query_posts('cat=5&post_per_page=-1');
    
    if(have_posts()):
        $active = 0;
      while(have_posts()) : the_post();
        echo '<div class="item';
        if ($active == 0) echo ' active';
        echo '">';
        echo '<img src="';
        echo get_post_meta(get_the_ID(), 'Image', true);
        echo '" alt="';
        echo the_title();
        echo '" class="img-responsive">';
        echo '<div class="carousel-caption"><h3>';
        echo the_title();
        echo '</h3><p>';
        echo the_content();
        echo '</p></div></div>';
        $active += 1;
      endwhile;
    else : echo '<p>No Content Found</p>';
    endif;
    ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#projects-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#projects-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>
