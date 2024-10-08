<?php
/** wp-display-header.php
 *
 * Plugin Name: WP Display Header
 * Plugin URI:  http://en.wp.obenland.it/wp-display-header/?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-display-header
 * Description: This plugin lets you specify a header image for each post and taxonomy/author archive page individually, from your default headers and custom headers.
 * Version:     2.1.0
 * Author:      Konstantin Obenland
 * Author URI:  http://en.wp.obenland.it/?utm_source=wordpress&utm_medium=plugin&utm_campaign=wp-display-header
 * Text Domain: wp-display-header
 * Domain Path: /lang
 * License:     GPLv2
 */


if ( ! class_exists( 'liveride_Wp_Plugins_v301' ) )
	require_once( 'wp-display-header-functions.php' );


register_activation_hook( __FILE__, array(
	'liveride_Wp_Display_Header',
	'activation'
) );


class liveride_Wp_Display_Header extends liveride_Wp_Plugins_v301 {

	///////////////////////////////////////////////////////////////////////////
	// METHODS, PUBLIC
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Constructor
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @return liveride_Wp_Display_Header
	 */
	public function __construct() {

		parent::__construct( array(
			'textdomain'     => 'wp-display-header',
			'plugin_path'    => get_template_directory() . '/functions/fe/wp-display-header/wp-display-header.php',
		));

		load_plugin_textdomain( 'wp-display-header' , false, 'wp-display-header/lang' );

		$this->hook( 'init' );
	}


	/**
	 * Checks if the current theme supports custom header functionality and bails
	 * if it doesn't. The plugin will stay deactivated.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 * @static
	 *
	 * @return void
	 */
	public static function activation() {

		if ( ! current_theme_supports( 'custom-header' ) ) {
			wp_die( __( 'Your current theme does not support Custom Headers.', 'wp-display-header' ), '', array(
				'back_link' => true
			) );
		}

		if ( version_compare( get_bloginfo( 'version' ), '3.2', '<' ) ) {
			wp_die( __( 'WP Display Headers requires WordPress version 3.2 or later.', 'wp-display-header' ), '', array(
				'back_link' => true
			) );
		}
	}


	/**
	 * Hooks in all the hooks :)
	 *
	 * @since  1.5.3 - 24.02.2012
	 * @access public
	 *
	 * @return void
	 */
	public function init() {

		$this->hook( 'theme_mod_header_image' );
		$this->hook( 'add_meta_boxes' );

		// Save info
		$this->hook( 'save_post' );
		$this->hook( 'edit_term' );
		$this->hook( 'personal_options_update',             'update_user'                );
		$this->hook( 'edit_user_profile_update',            'update_user'                );

		// Styles
		$this->hook( 'admin_init',                          'register_scripts_styles', 9 ); // Set priority to 9, so they can easily be deregistered.
		$this->hook( 'admin_print_styles-post-new.php',     'admin_print_styles'         );
		$this->hook( 'admin_print_styles-post.php',         'admin_print_styles'         );
		$this->hook( 'admin_print_styles-edit-tags.php',    'admin_print_styles'         );
		$this->hook( 'admin_print_styles-profile.php',      'admin_print_styles'         );
		$this->hook( 'admin_print_styles-user-edit.php',    'admin_print_styles'         );

		// Edit forms
		foreach ( get_taxonomies( array( 'show_ui' => true ) ) as $_tax )
			$this->hook( "{$_tax}_edit_form",               'edit_form',               9 ); // Let's make us a bit more important than we are.

		$this->hook( 'admin_init',                          'add_settings_field'         );
		$this->hook( 'show_user_profile',                   'edit_form'                  );
		$this->hook( 'show_user_profile',                   'edit_form'                  );
	}


	/**
	 * Returns the header url.
	 *
	 * Returns the default header when we are on the blog page, the header
	 * settings page or no specific header was defined for that post. Can be
	 * filtered!
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @param  string $header_url The header url as saved in the theme mods.
	 *
	 * @return string
	 */
	public function theme_mod_header_image( $header_url ) {

		if ( is_category() OR is_tag() OR is_tax() )
			$active_header = $this->get_active_tax_header();

		else if ( is_author() )
			$active_header = $this->get_active_author_header();

		else if ( is_singular() )
			$active_header = $this->get_active_post_header();

		if ( isset( $active_header ) AND $active_header )
			$header_url = $active_header;

		return $header_url;
	}


	/**
	 * Adds the header post meta box.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @param  string $post_type
	 *
	 * @return void
	 */
	public function add_meta_boxes( $post_type ) {
		add_meta_box( 'wp-display-header', __( 'Header' ), array( &$this, 'display_meta_box' ), $post_type, 'normal', 'high' );
	}


	/**
	 * Registers the stylesheet.
	 *
	 * The stylesheets can easily be deregistered be calling
	 * <code>wp_deregister_style( 'wp-display-header' );</code> on the
	 * admin_init hook.
	 *
	 * @since  1.5 - 22.01.2012
	 * @access public
	 *
	 * @return void
	 */
	public function register_scripts_styles() {
		$plugin_data = get_plugin_data( __FILE__, false, false );
		$suffix      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_register_style(
			$this->textdomain,
			plugins_url( "/css/{$this->textdomain}{$suffix}.css", __FILE__ ),
			array(),
			$plugin_data['Version']
		);
	}


	/**
	 * Enqueues the CSS so the Header meta box looks nice :)
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @return void
	 */
	public function admin_print_styles() {
		wp_enqueue_style( $this->textdomain );
	}


	/**
	 * Registers the setting and the settings field if it does not already
	 * exist.
	 *
	 * @since  1.0 - 22.01.2012
	 * @access public
	 *
	 * return void
	 */
	public function add_settings_field() {

		add_settings_section(
			$this->textdomain,
			__( 'Header' ),
			array(
				&$this,
				'settings_section_callback'
			),
			$this->textdomain
		);

		add_settings_field(
			$this->textdomain,
			__( 'Choose Header', 'wp-display-header' ),
			array(
				&$this,
				'header_selection_callback'
			),
			$this->textdomain,
			$this->textdomain
		);
	}


	/**
	 * Adds a settings section to the category edit screen.
	 *
	 * @since  1.0 - 22.01.2012
	 * @access public
	 *
	 * @param  stdClass $object
	 *
	 * @return void
	 */
	public function edit_form( $object ) {
if ( is_admin() ) {
		do_settings_sections( $this->textdomain );
	}}


	/**
	 * Renders the content of the post meta box.
	 *
	 * @since  1.0 - 22.01.2012
	 * @access public
	 *
	 * @param  stdClass $post
	 *
	 * @return void
	 */
	public function display_meta_box( $post ) {
		$active = $this->get_active_post_header( $post->ID, true );
		$this->header_selection_form( $active );
	}


	/**
	 * Echos out a description at the top of the section (between heading and
	 * fields).
	 *
	 * @since  1.0 - 22.01.2012
	 * @access public
	 *
	 * return  void
	 */
	public function settings_section_callback() {
		if ( 'profile' == get_current_screen()->base )
			_e( 'Select a header image for the author page.', 'wp-display-header' );

		elseif ( 'edit-tags' == get_current_screen()->base )
			_e( 'Select a header image for the taxonomy archive page.', 'wp-display-header' );
	}


	/**
	 * Displays the settings field HTML.
	 *
	 * @since  1.0 - 22.01.2012
	 * @access public
	 *
	 * @return void
	 */
	public function header_selection_callback() {
		$active = '';

		switch ( get_current_screen()->base ) {
			case 'profile':
				global $profileuser;
				$active = get_user_meta( $profileuser->ID, $this->textdomain, true );
				break;

			case 'edit-tags':
				global $tag;
				if ( $active = get_option( 'wpdh_tax_meta', '' ) )
					$active = isset( $active[ $tag->term_taxonomy_id ] ) ? $active[ $tag->term_taxonomy_id ] : '';
				break;
		}

		// If no header set yet, get default header
		if ( ! $active )
			$active = get_theme_mod( 'header_image' );

		$this->header_selection_form( $active );
	}


	/**
	 * Saves the selected header for this post.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @param  int $post_ID
	 *
	 * @return int Post ID
	 */
	public function save_post( $post_ID ) {

		if ( ( ! defined('DOING_AUTOSAVE') OR ! DOING_AUTOSAVE ) AND
			isset( $_POST[ $this->textdomain ] ) AND
			wp_verify_nonce( $_POST["{$this->textdomain}-nonce"], $this->textdomain ) ) {

			if ( isset( $_POST['wpdh-reset-header'] ) ) {
				delete_post_meta( $post_ID, '_wpdh_display_header' );

			} else {
				$value = in_array( $_POST[ $this->textdomain ], array( 'random', 'remove-header' ) ) ? $_POST[ $this->textdomain ] : esc_url_raw( $_POST[ $this->textdomain ] );
				update_post_meta( $post_ID, '_wpdh_display_header', $value );
			}
		}

		return $post_ID;
	}



	/**
	 * Sanitizes the settings field input.
	 *
	 * @since  2.0.0 - 12.03.2012
	 * @access public
	 *
	 * @param  int    $term_id
	 * @param  string $tt_id
	 * @param  string $taxonomy
	 *
	 * @return int Term ID
	 */
	public function edit_term( $term_id, $tt_id, $taxonomy ) {

		if ( ( ! defined('DOING_AUTOSAVE') OR ! DOING_AUTOSAVE ) AND
			isset( $_POST[ $this->textdomain] ) AND
			wp_verify_nonce($_POST["{$this->textdomain}-nonce"], $this->textdomain) ) {

			$term_meta = get_option( 'wpdh_tax_meta', array() );

			if ( isset( $_POST['wpdh-reset-header'] ) )
				unset( $term_meta[ $tt_id ] );

			else
				$term_meta[ $tt_id ] = in_array( $_POST[ $this->textdomain ], array( 'random', 'remove-header' ) ) ? $_POST[ $this->textdomain ] : esc_url_raw( $_POST[ $this->textdomain ] );

			update_option( 'wpdh_tax_meta', $term_meta );
		}

		return $term_id;
	}


	/**
	 * Sanitizes the settings field input.
	 *
	 * @since  2.0.0 - 12.03.2012
	 * @access public
	 *
	 * @param  int $user_id
	 *
	 * @return int User ID
	 */
	public function update_user( $user_id ) {

		if ( ( ! defined('DOING_AUTOSAVE') OR ! DOING_AUTOSAVE ) AND
			isset( $_POST[ $this->textdomain ] ) AND
			wp_verify_nonce($_POST["{$this->textdomain}-nonce"], $this->textdomain ) ) {

			if ( isset( $_POST['wpdh-reset-header'] ) ) {
				delete_user_meta( $user_id, $this->textdomain );

			} else {
				$value = in_array( $_POST[ $this->textdomain ], array( 'random', 'remove-header' ) ) ? $_POST[ $this->textdomain ] : esc_url_raw( $_POST[ $this->textdomain ] );
				update_user_meta( $user_id, $this->textdomain, $value );
			}
		}

		return $user_id;
	}


	///////////////////////////////////////////////////////////////////////////
	// METHODS, PROTECTED
	///////////////////////////////////////////////////////////////////////////

	/**
	 * Displays the settings field HTML.
	 *
	 * @since  1.0 - 22.01.2012
	 * @access protected
	 *
	 * @param  string $active
	 *
	 * @return void
	 */
	protected function header_selection_form( $active = '' ) {

		$headers = $this->get_headers();

		if ( empty( $headers ) ) {
			printf(
				__( 'The are no headers available. Please <a href="%s">upload a header image</a>!', 'wp-display-header' ),
				add_query_arg( array( 'page' => 'custom-header' ), admin_url( 'themes.php' ) )
			);
			return;
		}

		foreach ( array_keys( $headers ) as $header ) {
			foreach ( array( 'url', 'thumbnail_url' ) as $url ) {
				$headers[ $header ][ $url ] = sprintf(
					$headers[ $header ][ $url ],
					get_template_directory_uri(),
					get_stylesheet_directory_uri()
				);
			}
		}

		wp_nonce_field( 'wp-display-header', 'wp-display-header-nonce' );
		?>
		<div class="available-headers">
			<div class="random-header">
				<p>
					<label>
						<input name="wp-display-header" type="radio" value="random" <?php checked( 'random', $active ); ?> />
						<?php _e( '<strong>Random:</strong> Show a different image on each page.' ); ?>
					</label>
				</p>
				<p>
					<label>
						<input name="wp-display-header" type="radio" value="remove-header" <?php checked( 'remove-header', $active ); ?> />
						<?php _e( '<strong>None:</strong> Show no header image.' ); ?>
					</label>
				</p>
			</div>
			<?php
			foreach ( $headers as $header_key => $header ) {
				$header_url       = $header['url'];
				$header_thumbnail = $header['thumbnail_url'];
				$header_desc      = isset( $header['description'] ) ? $header['description'] : '';
			?>
			<div class="default-header">
				<label>
					<input name="wp-display-header" type="radio" value="<?php echo esc_attr( $header_url ); ?>" <?php checked( $header_url, $active ); ?> />
					<img width="230" src="<?php echo esc_url( $header_thumbnail ); ?>" alt="<?php echo esc_attr( $header_desc ); ?>" title="<?php echo esc_attr( $header_desc ); ?>" />
				</label>
			</div>
			<?php } ?>
			<div class="clear"></div>

			<?php submit_button( __( 'Restore Original Header Image' ), 'button', 'wpdh-reset-header', false ); ?>
			<span class="description"><?php _e( 'This will restore the original header image. You will not be able to restore any customizations.' ) ?></span>
		</div>
		<?php
	}


	/**
	 * Returns all registered headers.
	 *
	 * If there are uploaded headers via the WP Save Custom Header Plugin, they
	 * will be loaded, too.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 * @global $_wp_default_headers
	 *
	 * @return array
	 */
	protected function get_headers() {
		global $_wp_default_headers;

		$headers = array_merge( (array) $_wp_default_headers, get_uploaded_header_images() );

		return (array) apply_filters( 'wpdh_get_headers', $headers );
	}


	/**
	 * Determines the active header for the post and returns the url.
	 *
	 * The $raw variable is necessary so that the 'random' option stays
	 * selected in post edit screens.
	 *
	 * @since  2.0.0 - 12.03.2012
	 * @access protected
	 *
	 * @param  string  $post_ID
	 * @param  boolean $raw
	 *
	 * @return string
	 */
	protected function get_active_post_header( $post_ID = 0, $raw = false ) {

		if ( ! $post_ID ) {
			global $post;
			$post_ID = $post->ID;
		}

		$active = get_post_meta( $post_ID, '_wpdh_display_header', true );

		return apply_filters( 'wpdh_get_active_post_header', $this->get_active_header( $active, $raw ) );
	}


	/**
	 * Determines the active header for the category and returns the url.
	 *
	 * The $raw variable is necessary so that the 'random' option stays
	 * selected in post edit screens.
	 *
	 * @since  2.0.0 - 12.03.2012
	 * @access protected
	 *
	 * @return string
	 */
	protected function get_active_tax_header() {

		if ( $active = get_option( 'wpdh_tax_meta', false ) ) {
			$tt_id  = get_queried_object()->term_taxonomy_id;
			$active = isset( $active[ $tt_id ] ) ? $active[ $tt_id ] : '';
		}

		return apply_filters( 'wpdh_get_active_tax_header', $this->get_active_header( $active ) );
	}


	/**
	 * Determines the active header for the author and returns the url.
	 *
	 * The $raw variable is necessary so that the 'random' option stays
	 * selected in post edit screens.
	 *
	 * @since  2.0.0 - 12.03.2012
	 * @access protected
	 *
	 * @return string
	 */
	protected function get_active_author_header() {
		$active = get_user_meta( get_queried_object()->ID, $this->textdomain, true );
		return apply_filters( 'wpdh_get_active_author_header', $this->get_active_header( $active ) );
	}


	/**
	 * Determines the active header for the post and returns the url.
	 *
	 * The $raw variable is necessary so that the 'random' option stays
	 * selected in post edit screens.
	 *
	 * @since  1.0 - 23.03.2011
	 * @access public
	 *
	 * @param  string  $header Header URL
	 * @param  boolean $raw
	 *
	 * @return string
	 */
	protected function get_active_header( $header, $raw = false ) {

		if ( 'random' == $header AND ! $raw ) {
			$headers = $this->get_headers();
			$header  = sprintf(
				$headers[ array_rand( $headers ) ]['url'],
				get_template_directory_uri(),
				get_stylesheet_directory_uri()
			);
		}

		return apply_filters( 'wpdh_get_active_header', $header );
	}
} // End of class liveride_Wp_Display_Header.


/**
 * Instantiates the class if current theme supports Custom Headers.
 *
 * @since  1.2 - 03.05.2011
 *
 * @return void
 */
function liveride_wpdh_instantiate() {

	if ( current_theme_supports( 'custom-header' ) )
		new liveride_Wp_Display_Header;
}
add_action( 'init', 'liveride_wpdh_instantiate', 1 );


/* End of file wp-display-header.php */