<?php
/**
 * The searchform template file.
 * @package MeadowHill
 * @since MeadowHill 1.0.0
*/
?>
<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
  <div class="searchform-wrapper"><input type="text" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'meadowhill' ); ?>" />
  <input type="image" src="<?php echo get_template_directory_uri(); ?>/images/empty.gif" class="send" name="searchsubmit" alt="send" /></div>
</form>