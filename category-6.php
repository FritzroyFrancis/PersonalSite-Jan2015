<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/music.css" type="text/css" media="screen" />

<?php
	get_header();
?>
<div id="songPlayer">
        <img src="<?php bloginfo('template_directory'); ?>/image/music.png" class="grey" />
        <audio id="player" src=""></audio>
        <div id="progress-bar">        
          <div id='songTimeMeasure'></div>
        </div>
        <img class="music-controls" id="play-btn" src="<?php bloginfo('template_directory'); ?>/image/play.png"/>
      </div>
      <ul id="songList">
        <?php

          $args = array(
            'post_type' => 'attachment',
            'post_mime_type' =>'audio',
            'post_status' => 'inherit',
            'posts_per_page' => -1,
          );

          $query_songs = new WP_Query( $args );
          $songs = array();
          foreach ($query_songs->posts as $song)
          {
            echo '<li onclick=loadMusicData("';
            echo $song->ID;
            echo '",ajaxurl)>';
            echo get_post($song->ID)->post_excerpt;
            echo ' - ';
            echo get_post($song->ID)->post_title;
            echo '</li>';
          }
        ?>
      </ul>
    <div id="songDesc" style="text-align:center">Music is nearly universal, and most people can claim that music helped them get a new perspective with their lives. It certainly did for me, and was a friend of mine even when I had none. Here are a couple of links to remixes I've made recently.</div>
    <!-- end .content --></div>
  <!-- end .container --></div>
</body>
</html>