<?php
/**
 * Template Name: Map Demo Page
 */

get_header(); ?>
<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		  <div class="entry-content">
			<?php the_content(); ?>
        <div id="themap">
          <?php
          $loc = get_post_meta($post->ID, 'loc', true );
          $deg = explode(',' , $loc);
          // Echo the lat & lng for testing
          //echo $loc;
          $lat = $deg[0];
          $lng = $deg[1];
          ?>
          <script type="text/javascript">
          var iconBase = '<?php echo get_stylesheet_directory_uri() ?>/img/icons/';
          var map;
          jQuery(document).ready(function(){
            map = new GMaps({
              el: '#themap',
              lat: <?php echo $lat; ?>,
              lng: <?php echo $lng; ?>,
              zoomControl : true,
              zoomControlOpt: {
                  style : 'SMALL',
                  position: 'TOP_LEFT'
              },
              panControl : false,
              scrollwheel: false,
              streetViewControl : false,
              mapTypeControl: false,
              overviewMapControl: false
              });
            map.addMarker({
              lat: <?php echo $lat; ?>,
              lng: <?php echo $lng; ?>,
              icon: iconBase + 'letter_m.png'
            });
          });
          </script>
        </div>
	   </div><!-- .entry-content -->
	</article><!-- #post -->
				
<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>