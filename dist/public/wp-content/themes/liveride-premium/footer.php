<?php
/**
 * The footer template file.
 * @package LiveRide
 * @since LiveRide 1.0.0
*/
?>
<?php global $liveride_options;
foreach ($liveride_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
<?php if ( is_active_sidebar( 'sidebar-2' ) && !is_page_template('template-landing-page.php') ) { ?>
  <footer id="footer"> 
<?php dynamic_sidebar( 'sidebar-2' ); ?> 
  </footer>  <!-- end of footer -->
<?php } ?>
</div> <!-- end of container -->
<div class="sidebar-background"></div>
<?php wp_footer(); ?>   
<?php if ($liveride_own_javascript_footer != '') { ?>
<?php echo stripslashes_deep($liveride_own_javascript_footer); ?>
<?php } ?>      
</body>
</html>