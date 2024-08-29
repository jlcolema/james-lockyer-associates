<?php
/**
 * The sidebar template file.
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
<?php if ($liveride_display_sidebar != 'Hide') { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>