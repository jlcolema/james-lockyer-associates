<?php
/**
 * The sidebar template file.
 * @package DaisyChain
 * @since DaisyChain 1.0.0
*/
?>
<?php global $daisychain_options;
foreach ($daisychain_options as $value) {
	if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
		$$value['id'] = $value['std'];
	}
	elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
} ?>
<?php if ($daisychain_display_sidebar != 'Hide') { ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>