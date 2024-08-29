<?php
/**
 * NatureSpace Theme Customizer.
 * @package NatureSpace
 * @since NatureSpace 2.0.0
*/
function naturespace_customize_register($wp_customize){

$naturespace_fonts = array(
			'default' => 'default',	
			'Abel' => 'Abel',			
			'Aclonica' => 'Aclonica',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Aldrich' => 'Aldrich',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
      'Amarante' => 'Amarante',
			'Amaranth' => 'Amaranth',
      'Andika' => 'Andika',
			'Antic' => 'Antic',
			'Arimo' => 'Arimo',	
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Brawler' => 'Brawler',
			'Buda' => 'Buda',	
      'Butcherman' => 'Butcherman',	
			'Cantarell' => 'Cantarell',	
      'Cherry Swash' => 'Cherry Swash',				
			'Chivo' => 'Chivo',			
			'Coda' => 'Coda',	
      'Concert One' => 'Concert One',		
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cousine' => 'Cousine',			
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Crimson Text' => 'Crimson Text',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Didact Gothic' => 'Didact Gothic',
			'Dorsa' => 'Dorsa',
			'Droid Sans' => 'Droid Sans',
			'Droid Sans Mono' => 'Droid Sans Mono',
      'Droid Serif' => 'Droid Serif',
			'EB Garamond' => 'EB Garamond',
			'Expletus Sans' => 'Expletus Sans',
			'Fanwood Text' => 'Fanwood Text',
			'Federo' => 'Federo',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
      'Gilda Display' => 'Gilda Display',
			'Give You Glory' => 'Give You Glory',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Gravitas One' => 'Gravitas One',
			'Gruppo' => 'Gruppo',
			'Hammersmith One' => 'Hammersmith One',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Inconsolata' => 'Inconsolata',
			'Indie Flower' => 'Indie Flower',
      'IM Fell English' => 'IM Fell English',
			'Irish Grover' => 'Irish Grover',
			'Irish Growler' => 'Irish Growler',
			'Istok Web' => 'Istok Web',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'Kameron' => 'Kameron',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'La Belle Aurore' => 'La Belle Aurore',
      'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Lekton' => 'Lekton',
      'Lily Script One' => 'Lily Script One',
			'Limelight' => 'Limelight',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
      'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Maiden Orange' => 'Maiden Orange',
			'Mako' => 'Mako',
			'Marvel' => 'Marvel',
			'Maven Pro' => 'Maven Pro',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
      'Medula One' => 'Medula One',
			'Megrim' => 'Megrim',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Miltonian' => 'Miltonian',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
      'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
      'Montaga' => 'Montaga',
			'Montez' => 'Montez',
      'Montserrat' => 'Montserrat',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Muli' => 'Muli',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'News Cycle' => 'News Cycle',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
      'Open Sans' => 'Open Sans',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Ovo' => 'Ovo',
			'Pacifico' => 'Pacifico',
			'Passero One' => 'Passero One',
			'Patrick Hand' => 'Patrick Hand',
			'Paytone One' => 'Paytone One',
			'Permanent Marker' => 'Permanent Marker',
			'Philosopher' => 'Philosopher',
			'Play' => 'Play',
			'Playfair Display' => 'Playfair Display',
			'Podkova' => 'Podkova',
			'Poller One' => 'Poller One',
			'Pompiere' => 'Pompiere',
			'Prata' => 'Prata',
			'Prociono' => 'Prociono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Puritan' => 'Puritan',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Radley' => 'Radley',
			'Raleway' => 'Raleway', 
      'Rationale' => 'Rationale',
			'Redressed' => 'Redressed',
      'Reenie Beanie' => 'Reenie Beanie', 
      'Roboto' => 'Roboto',
      'Roboto Condensed' => 'Roboto Condensed',
			'Rock Salt' => 'Rock Salt',
			'Rochester' => 'Rochester',
			'Rokkitt' => 'Rokkitt',
			'Rosario' => 'Rosario',
			'Ruslan Display' => 'Ruslan Display',
      'Sancreek' => 'Sancreek',
			'Sansita One' => 'Sansita One',
			'Schoolbell' => 'Schoolbell',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shanti' => 'Shanti',
			'Short Stack' => 'Short Stack',
			'Sigmar One' => 'Sigmar One',
			'Six Caps' => 'Six Caps',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Special Elite' => 'Special Elite',
			'Spinnaker' => 'Spinnaker',
			'Stardos Stencil' => 'Stardos Stencil',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Sunshiney' => 'Sunshiney',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Tangerine' => 'Tangerine',
			'Tenor Sans' => 'Tenor Sans',
			'Terminal Dosis Light' => 'Terminal Dosis Light',
			'Tinos' => 'Tinos',
			'Tulpen One' => 'Tulpen One',
			'Ubuntu' => 'Ubuntu',
			'Ultra' => 'Ultra',
      'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
      'Unkempt' => 'Unkempt',
			'Unna' => 'Unna',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Voltaire' => 'Voltaire',
			'VT323' => 'VT323',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Wire One' => 'Wire One',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yellowtail' => 'Yellowtail',
			'Yeseva One' => 'Yeseva One',
			'Zeyada' => 'Zeyada');

    $wp_customize->add_section('naturespace_header_color_settings', array(
        'title'    => __('NatureSpace Header Color Settings', 'naturespace'),
        'description' => '',
        'priority' => 120,
    ));
    $wp_customize->add_section('naturespace_content_color_settings', array(
        'title'    => __('NatureSpace Main Content Color Settings', 'naturespace'),
        'description' => '',
        'priority' => 130,
    ));
    $wp_customize->add_section('naturespace_sidebar_color_settings', array(
        'title'    => __('NatureSpace Sidebar Color Settings', 'naturespace'),
        'description' => '',
        'priority' => 140,
    ));
    $wp_customize->add_section('naturespace_footer_color_settings', array(
        'title'    => __('NatureSpace Footer Color Settings', 'naturespace'),
        'description' => '',
        'priority' => 150,
    ));
    $wp_customize->add_section('naturespace_html_color_settings', array(
        'title'    => __('NatureSpace Form/HTML Elements Color Settings', 'naturespace'),
        'description' => '',
        'priority' => 160,
    ));
    $wp_customize->add_section('naturespace_font_settings', array(
        'title'    => __('NatureSpace Font Settings', 'naturespace'),
        'description' => '',
        'priority' => 170,
    ));
    
    //  ==============================
    //  = Character Set              =
    //  ==============================
    $wp_customize->add_setting('naturespace_character_set', array(
        'default'        => get_option('naturespace_character_set', 'latin'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_character_set_control', array(
        'label'      => __('Character Set', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_character_set',
        'type'       => 'radio',
        'choices'    => array(
            'latin' => __( 'Latin' , 'naturespace' ),
            'latin-ext' => __( 'Latin Extended' , 'naturespace' ),
            'cyrillic' => __( 'Cyrillic' , 'naturespace' ),
            'cyrillic-ext' => __( 'Cyrillic Extended' , 'naturespace' ),
            'greek' => __( 'Greek' , 'naturespace' ),
            'greek-ext' => __( 'Greek Extended' , 'naturespace' ),
            'vietnamese' => __( 'Vietnamese' , 'naturespace' ),
        ),
    ));
 
    //  =============================
    //  = Body font                 =
    //  =============================
     $wp_customize->add_setting('naturespace_body_google_fonts', array(
        'default'        => get_option('naturespace_body_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_body_google_fonts_control', array(
        'settings' => 'naturespace_body_google_fonts',
        'label'   => __('Body font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ==========================
    //  = Body font size         =
    //  ==========================
    $wp_customize->add_setting('naturespace_body_google_fonts_size', array(
        'default'        => get_option('naturespace_body_google_fonts_size', '14'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_body_google_fonts_size_control', array(
        'label'      => __('Body font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_body_google_fonts_size',
    ));
    
    //  =============================
    //  = Site Title font           =
    //  =============================
     $wp_customize->add_setting('naturespace_headings_google_fonts', array(
        'default'        => get_option('naturespace_headings_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_headings_google_fonts_control', array(
        'settings' => 'naturespace_headings_google_fonts',
        'label'   => __('Site Title font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ==========================
    //  = Site Title font size   =
    //  ==========================
    $wp_customize->add_setting('naturespace_headings_google_fonts_size', array(
        'default'        => get_option('naturespace_headings_google_fonts_size', '44'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headings_google_fonts_size_control', array(
        'label'      => __('Site Title font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headings_google_fonts_size',
    ));
    
    //  =============================
    //  = Page/Post Headlines font  =
    //  =============================
     $wp_customize->add_setting('naturespace_headline_google_fonts', array(
        'default'        => get_option('naturespace_headline_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_headline_google_fonts_control', array(
        'settings' => 'naturespace_headline_google_fonts',
        'label'   => __('Page/Post Headlines (h1 - h6) font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ==========================
    //  = H1 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h1_size', array(
        'default'        => get_option('naturespace_headline_h1_size', '26'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h1_size_control', array(
        'label'      => __('H1 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h1_size',
    ));
    
    //  ==========================
    //  = H2 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h2_size', array(
        'default'        => get_option('naturespace_headline_h2_size', '22'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h2_size_control', array(
        'label'      => __('H2 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h2_size',
    ));
    
    //  ==========================
    //  = H3 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h3_size', array(
        'default'        => get_option('naturespace_headline_h3_size', '19'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h3_size_control', array(
        'label'      => __('H3 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h3_size',
    ));
    
    //  ==========================
    //  = H4 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h4_size', array(
        'default'        => get_option('naturespace_headline_h4_size', '17'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h4_size_control', array(
        'label'      => __('H4 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h4_size',
    ));
    
    //  ==========================
    //  = H5 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h5_size', array(
        'default'        => get_option('naturespace_headline_h5_size', '15'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h5_size_control', array(
        'label'      => __('H5 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h5_size',
    ));
    
    //  ==========================
    //  = H6 Headlines font size =
    //  ==========================
    $wp_customize->add_setting('naturespace_headline_h6_size', array(
        'default'        => get_option('naturespace_headline_h6_size', '14'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_h6_size_control', array(
        'label'      => __('H6 Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_h6_size',
    ));
    
    //  =============================================
    //  = NatureSpace Posts Widgets headlines font =
    //  =============================================
     $wp_customize->add_setting('naturespace_headline_box_google_fonts', array(
        'default'        => get_option('naturespace_headline_box_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_headline_box_google_fonts_control', array(
        'settings' => 'naturespace_headline_box_google_fonts',
        'label'   => __('NatureSpace Posts Widgets headlines font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ==================================================
    //  = NatureSpace Posts Widgets headlines font size =
    //  ==================================================
    $wp_customize->add_setting('naturespace_headline_box_google_fonts_size', array(
        'default'        => get_option('naturespace_headline_box_google_fonts_size', '26'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_headline_box_google_fonts_size_control', array(
        'label'      => __('NatureSpace Posts Widgets headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_headline_box_google_fonts_size',
    ));
    
    //  =============================
    //  = Post Entry Headline font  =
    //  =============================
     $wp_customize->add_setting('naturespace_postentry_google_fonts', array(
        'default'        => get_option('naturespace_postentry_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_postentry_google_fonts_control', array(
        'settings' => 'naturespace_postentry_google_fonts',
        'label'   => __('Post Entry Headline font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  =================================
    //  = Post Entry Headline font size =
    //  =================================
    $wp_customize->add_setting('naturespace_postentry_google_fonts_size', array(
        'default'        => get_option('naturespace_postentry_google_fonts_size', '22'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_postentry_google_fonts_size_control', array(
        'label'      => __('Post Entry Headline font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_postentry_google_fonts_size',
    ));
    
    //  ========================================
    //  = Sidebar/Footer Widget Headlines font =
    //  ========================================
     $wp_customize->add_setting('naturespace_sidebar_google_fonts', array(
        'default'        => get_option('naturespace_sidebar_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_sidebar_google_fonts_control', array(
        'settings' => 'naturespace_sidebar_google_fonts',
        'label'   => __('Sidebar/Footer Widget Headlines font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ======================================
    //  = Sidebar Widget Headlines font size =
    //  ======================================
    $wp_customize->add_setting('naturespace_sidebar_google_fonts_size', array(
        'default'        => get_option('naturespace_sidebar_google_fonts_size', '16'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_sidebar_google_fonts_size_control', array(
        'label'      => __('Sidebar Widget Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_sidebar_google_fonts_size',
    ));
    
    //  ======================================
    //  = Footer Widget Headlines font size  =
    //  ======================================
    $wp_customize->add_setting('naturespace_footer_google_fonts_size', array(
        'default'        => get_option('naturespace_footer_google_fonts_size', '18'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_footer_google_fonts_size_control', array(
        'label'      => __('Footer Widget Headlines font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_footer_google_fonts_size',
    ));
    
    //  =============================
    //  = Main Header Menu font     =
    //  =============================
     $wp_customize->add_setting('naturespace_menu_google_fonts', array(
        'default'        => get_option('naturespace_menu_google_fonts', 'default'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
 
    ));
    $wp_customize->add_control( 'naturespace_menu_google_fonts_control', array(
        'settings' => 'naturespace_menu_google_fonts',
        'label'   => __('Main Header Menu font', 'naturespace'),
        'section' => 'naturespace_font_settings',
        'type'    => 'select',
        'choices'    => $naturespace_fonts,
    ));
    
    //  ==============================
    //  = Main Header Menu font size =
    //  ==============================
    $wp_customize->add_setting('naturespace_menu_google_fonts_size', array(
        'default'        => get_option('naturespace_menu_google_fonts_size', '14'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control('naturespace_menu_google_fonts_size_control', array(
        'label'      => __('Main Header Menu font size', 'naturespace'),
        'section'    => 'naturespace_font_settings',
        'settings'   => 'naturespace_menu_google_fonts_size',
    ));
    
//  ===========================================================================
//  = COLOR SETTINGS                                                          =
//  ===========================================================================

    //  =================================
    //  = Carousel Box background color =
    //  =================================
    $wp_customize->add_setting('naturespace_carousel_background_color', array(
        'default'           => get_option('naturespace_carousel_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_carousel_background_color_control', array(
        'label'    => __('Carousel Box background color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_carousel_background_color',
    )));
    
    //  =================================
    //  = Carousel Arrows color         =
    //  =================================
    $wp_customize->add_setting('naturespace_arrows_background_color', array(
        'default'           => get_option('naturespace_arrows_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_arrows_background_color_control', array(
        'label'    => __('Carousel Arrows color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_arrows_background_color',
    )));
    
    //  =================================
    //  = Carousel Box Links color      =
    //  =================================
    $wp_customize->add_setting('naturespace_carousel_links_color', array(
        'default'           => get_option('naturespace_carousel_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_carousel_links_color_control', array(
        'label'    => __('Carousel Box Links color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_carousel_links_color',
    )));
    
    //  ==================================
    //  = Carousel Box Links hover color =
    //  ==================================
    $wp_customize->add_setting('naturespace_carousel_links_hover_color', array(
        'default'           => get_option('naturespace_carousel_links_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_carousel_links_hover_color_control', array(
        'label'    => __('Carousel Box Links hover color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_carousel_links_hover_color',
    )));
    
    //  ======================================================
    //  = Social Networks Links/Contact Box background color =
    //  ======================================================
    $wp_customize->add_setting('naturespace_top_menu_background_color', array(
        'default'           => get_option('naturespace_top_menu_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_top_menu_background_color_control', array(
        'label'    => __('Social Networks Links/Contact Box background color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_top_menu_background_color',
    )));
    
    //  =========================================================
    //  = Social Networks Links/Contact Box border-bottom color =
    //  =========================================================
    $wp_customize->add_setting('naturespace_top_menu_border_color', array(
        'default'           => get_option('naturespace_top_menu_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_top_menu_border_color_control', array(
        'label'    => __('Social Networks Links/Contact Box border-bottom color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_top_menu_border_color',
    )));
    
    //  ==================================
    //  = Contact Information color      =
    //  ==================================
    $wp_customize->add_setting('naturespace_contact_color', array(
        'default'           => get_option('naturespace_contact_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_contact_color_control', array(
        'label'    => __('Contact Information Text color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_contact_color',
    )));
    
    //  ===================================
    //  = Contact Information Icons color =
    //  ===================================
    $wp_customize->add_setting('naturespace_contact_icons_color', array(
        'default'           => get_option('naturespace_contact_icons_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_contact_icons_color_control', array(
        'label'    => __('Contact Information Icons color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_contact_icons_color',
    )));
    
    //  ===================================
    //  = Social Networks Links color     =
    //  ===================================
    $wp_customize->add_setting('naturespace_social_icons_color', array(
        'default'           => get_option('naturespace_social_icons_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_social_icons_color_control', array(
        'label'    => __('Social Networks Links color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_social_icons_color',
    )));
    
    //  =====================================
    //  = Social Networks Links hover color =
    //  =====================================
    $wp_customize->add_setting('naturespace_social_icons_hover_color', array(
        'default'           => get_option('naturespace_social_icons_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_social_icons_hover_color_control', array(
        'label'    => __('Social Networks Links hover color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_social_icons_hover_color',
    )));
    
    //  ====================================
    //  = Main Menu Links color            =
    //  ====================================
    $wp_customize->add_setting('naturespace_main_header_menu_color', array(
        'default'           => get_option('naturespace_main_header_menu_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_header_menu_color_control', array(
        'label'    => __('Main Menu Links color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_header_menu_color',
    )));
    
    //  ====================================
    //  = Main Menu Links hover color      =
    //  ====================================
    $wp_customize->add_setting('naturespace_main_header_menu_hover_color', array(
        'default'           => get_option('naturespace_main_header_menu_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_header_menu_hover_color_control', array(
        'label'    => __('Main Menu Links hover color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_header_menu_hover_color',
    )));
    
    //  ==========================================
    //  = Active Main Menu Links color           =
    //  ==========================================
    $wp_customize->add_setting('naturespace_active_main_header_menu_color', array(
        'default'           => get_option('naturespace_active_main_header_menu_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_active_main_header_menu_color_control', array(
        'label'    => __('Active Main Menu Links color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_active_main_header_menu_color',
    )));
    
    //  =================================================
    //  = Main Menu drop-down submenus background color =
    //  =================================================
    $wp_customize->add_setting('naturespace_main_submenu_background_color', array(
        'default'           => get_option('naturespace_main_submenu_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_submenu_background_color_control', array(
        'label'    => __('Main Menu drop-down submenus background color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_submenu_background_color',
    )));
    
    //  =================================================
    //  = Main Menu drop-down submenus text color       =
    //  =================================================
    $wp_customize->add_setting('naturespace_main_submenu_text_color', array(
        'default'           => get_option('naturespace_main_submenu_text_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_submenu_text_color_control', array(
        'label'    => __('Main Menu drop-down submenus text color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_submenu_text_color',
    )));
    
    //  ===================================================
    //  = Main Menu drop-down submenus items border color =
    //  ===================================================
    $wp_customize->add_setting('naturespace_main_submenu_border_color', array(
        'default'           => get_option('naturespace_main_submenu_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_submenu_border_color_control', array(
        'label'    => __('Main Menu drop-down submenus items border color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_submenu_border_color',
    )));
    
    //  ===================================================
    //  = Main Menu drop-down submenus items hover color  =
    //  ===================================================
    $wp_customize->add_setting('naturespace_main_submenu_hover_color', array(
        'default'           => get_option('naturespace_main_submenu_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_submenu_hover_color_control', array(
        'label'    => __('Main Menu drop-down submenus items hover color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_main_submenu_hover_color',
    )));
    
    //  ==========================================
    //  = Header Content background color        =
    //  ==========================================
    $wp_customize->add_setting('naturespace_header_content_background_color', array(
        'default'           => get_option('naturespace_header_content_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_header_content_background_color_control', array(
        'label'    => __('Header Content background color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_header_content_background_color',
    )));
    
    //  ==========================================
    //  = Header Content border-bottom color     =
    //  ==========================================
    $wp_customize->add_setting('naturespace_header_content_border_color', array(
        'default'           => get_option('naturespace_header_content_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_header_content_border_color_control', array(
        'label'    => __('Header Content border-bottom color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_header_content_border_color',
    )));
    
    //  ==========================================
    //  = Site Title color                       =
    //  ==========================================
    $wp_customize->add_setting('naturespace_site_title_color', array(
        'default'           => get_option('naturespace_site_title_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_site_title_color_control', array(
        'label'    => __('Site Title color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_site_title_color',
    )));
    
    //  ==========================================
    //  = Site Title hover color                 =
    //  ==========================================
    $wp_customize->add_setting('naturespace_site_title_hover_color', array(
        'default'           => get_option('naturespace_site_title_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_site_title_hover_color_control', array(
        'label'    => __('Site Title hover color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_site_title_hover_color',
    )));
    
    //  ==========================================
    //  = Homepage Header Image Headline color   =
    //  ==========================================
    $wp_customize->add_setting('naturespace_header_image_headline_color', array(
        'default'           => get_option('naturespace_header_image_headline_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_header_image_headline_color_control', array(
        'label'    => __('Homepage Header Image Headline color', 'naturespace'),
        'section'  => 'naturespace_header_color_settings',
        'settings' => 'naturespace_header_image_headline_color',
    )));
    
    //  ==========================================
    //  = Main Content background color          =
    //  ==========================================
    $wp_customize->add_setting('naturespace_main_content_background_color', array(
        'default'           => get_option('naturespace_main_content_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_content_background_color_control', array(
        'label'    => __('Main Content background color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_main_content_background_color',
    )));
    
    //  ==========================================
    //  = Main Content Text color                =
    //  ==========================================
    $wp_customize->add_setting('naturespace_body_color', array(
        'default'           => get_option('naturespace_body_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_body_color_control', array(
        'label'    => __('Main Content Text color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_body_color',
    )));
    
    //  ==========================================
    //  = Page/Post Title color                  =
    //  ==========================================
    $wp_customize->add_setting('naturespace_main_headlines_color', array(
        'default'           => get_option('naturespace_main_headlines_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_main_headlines_color_control', array(
        'label'    => __('Page/Post Title color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_main_headlines_color',
    )));
    
    //  ==========================================
    //  = Page/Post Headlines color              =
    //  ==========================================
    $wp_customize->add_setting('naturespace_headlines_color', array(
        'default'           => get_option('naturespace_headlines_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_headlines_color_control', array(
        'label'    => __('H1 - H6 Headlines color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_headlines_color',
    )));
    
    //  ==========================================
    //  = Breadcrumb Navigation/Post Meta color  =
    //  ==========================================
    $wp_customize->add_setting('naturespace_meta_color', array(
        'default'           => get_option('naturespace_meta_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_meta_color_control', array(
        'label'    => __('Breadcrumb Navigation/Post Meta color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_meta_color',
    )));
    
    //  ===============================================
    //  = Breadcrumb Navigation/Post Meta Links color =
    //  ===============================================
    $wp_customize->add_setting('naturespace_meta_links_color', array(
        'default'           => get_option('naturespace_meta_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_meta_links_color_control', array(
        'label'    => __('Breadcrumb Navigation/Post Meta Links color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_meta_links_color',
    )));
    
    //  ===============================================
    //  = NatureSpace Posts Widgets headlines color  =
    //  ===============================================
    $wp_customize->add_setting('naturespace_homepage_headlines_color', array(
        'default'           => get_option('naturespace_homepage_headlines_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_homepage_headlines_color_control', array(
        'label'    => __('NatureSpace Posts Widgets headlines color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_homepage_headlines_color',
    )));
    
    //  ===============================================
    //  = Post Entry Headline color                   =
    //  ===============================================
    $wp_customize->add_setting('naturespace_post_entry_color', array(
        'default'           => get_option('naturespace_post_entry_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_post_entry_color_control', array(
        'label'    => __('Post Entry Headline color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_post_entry_color',
    )));
    
    //  ===============================================
    //  = Post Entry Headline hover color             =
    //  ===============================================
    $wp_customize->add_setting('naturespace_post_entry_hover_color', array(
        'default'           => get_option('naturespace_post_entry_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_post_entry_hover_color_control', array(
        'label'    => __('Post Entry Headline hover color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_post_entry_hover_color',
    )));
    
    //  ===============================================
    //  = Main Content Links color                    =
    //  ===============================================
    $wp_customize->add_setting('naturespace_content_links_color', array(
        'default'           => get_option('naturespace_content_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_content_links_color_control', array(
        'label'    => __('Main Content Links color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_content_links_color',
    )));
    
    //  =================================================
    //  = Post Author's Comments background color       =
    //  =================================================
    $wp_customize->add_setting('naturespace_author_comments_background_color', array(
        'default'           => get_option('naturespace_author_comments_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_author_comments_background_color_control', array(
        'label'    => __('Post Author&#8217;s Comments background color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_author_comments_background_color',
    )));
    
    //  =================================================
    //  = Sticky Post background color                  =
    //  =================================================
    $wp_customize->add_setting('naturespace_sticky_post_background_color', array(
        'default'           => get_option('naturespace_sticky_post_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_sticky_post_background_color_control', array(
        'label'    => __('Sticky Post background color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_sticky_post_background_color',
    )));
    
    //  ==================================================
    //  = NatureSpace Posts-Thumbnail items hover color =
    //  ==================================================
    $wp_customize->add_setting('naturespace_posts_thumbnail_background_color', array(
        'default'           => get_option('naturespace_posts_thumbnail_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_posts_thumbnail_background_color_control', array(
        'label'    => __('NatureSpace Posts-Thumbnail items hover color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_posts_thumbnail_background_color',
    )));
    
    //  =================================================
    //  = Highlighted text background color             =
    //  =================================================
    $wp_customize->add_setting('naturespace_highlight_background_color', array(
        'default'           => get_option('naturespace_highlight_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_highlight_background_color_control', array(
        'label'    => __('Highlighted text background color', 'naturespace'),
        'section'  => 'naturespace_content_color_settings',
        'settings' => 'naturespace_highlight_background_color',
    )));
    
    //  ==========================================
    //  = Sidebar Widget Headlines color         =
    //  ==========================================
    $wp_customize->add_setting('naturespace_sidebar_widget_color', array(
        'default'           => get_option('naturespace_sidebar_widget_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_sidebar_widget_color_control', array(
        'label'    => __('Sidebar Widget Headlines color', 'naturespace'),
        'section'  => 'naturespace_sidebar_color_settings',
        'settings' => 'naturespace_sidebar_widget_color',
    )));
    
    //  =============================================
    //  = Sidebar Widget Headlines background color =
    //  =============================================
    $wp_customize->add_setting('naturespace_sidebar_widget_background_color', array(
        'default'           => get_option('naturespace_sidebar_widget_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_sidebar_widget_background_color_control', array(
        'label'    => __('Sidebar Widget Headlines background color', 'naturespace'),
        'section'  => 'naturespace_sidebar_color_settings',
        'settings' => 'naturespace_sidebar_widget_background_color',
    )));
    
    //  ==========================================
    //  = Sidebar Text color                     =
    //  ==========================================
    $wp_customize->add_setting('naturespace_sidebar_text_color', array(
        'default'           => get_option('naturespace_sidebar_text_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_sidebar_text_color_control', array(
        'label'    => __('Sidebar Text color', 'naturespace'),
        'section'  => 'naturespace_sidebar_color_settings',
        'settings' => 'naturespace_sidebar_text_color',
    )));
    
    //  ==========================================
    //  = Sidebar Links color                    =
    //  ==========================================
    $wp_customize->add_setting('naturespace_sidebar_links_color', array(
        'default'           => get_option('naturespace_sidebar_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_sidebar_links_color_control', array(
        'label'    => __('Sidebar Links color', 'naturespace'),
        'section'  => 'naturespace_sidebar_color_settings',
        'settings' => 'naturespace_sidebar_links_color',
    )));
    
    //  ==========================================
    //  = Footer background color                =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_background_color', array(
        'default'           => get_option('naturespace_footer_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_background_color_control', array(
        'label'    => __('Footer background color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_background_color',
    )));
    
    //  ==========================================
    //  = Footer Notices background color        =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_notices_background_color', array(
        'default'           => get_option('naturespace_footer_notices_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_notices_background_color_control', array(
        'label'    => __('Footer Notices background color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_notices_background_color',
    )));
    
    //  ==========================================
    //  = Footer Widget Headlines color          =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_widget_color', array(
        'default'           => get_option('naturespace_footer_widget_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_widget_color_control', array(
        'label'    => __('Footer Widget Headlines color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_widget_color',
    )));
    
    //  ==========================================
    //  = Footer Widget Headlines border color   =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_widget_border_color', array(
        'default'           => get_option('naturespace_footer_widget_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_widget_border_color_control', array(
        'label'    => __('Footer Widget Headlines border color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_widget_border_color',
    )));
    
    //  ==========================================
    //  = Footer Text color                      =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_text_color', array(
        'default'           => get_option('naturespace_footer_text_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_text_color_control', array(
        'label'    => __('Footer Text color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_text_color',
    )));
    
    //  ==========================================
    //  = Footer Notices Text color              =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_notices_text_color', array(
        'default'           => get_option('naturespace_footer_notices_text_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_notices_text_color_control', array(
        'label'    => __('Footer Notices Text color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_notices_text_color',
    )));
    
    //  ==========================================
    //  = Footer Links color                     =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_links_color', array(
        'default'           => get_option('naturespace_footer_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_links_color_control', array(
        'label'    => __('Footer Links color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_links_color',
    )));
    
    //  ==========================================
    //  = Footer Notices Links color             =
    //  ==========================================
    $wp_customize->add_setting('naturespace_footer_notices_links_color', array(
        'default'           => get_option('naturespace_footer_notices_links_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_footer_notices_links_color_control', array(
        'label'    => __('Footer Notices Links color', 'naturespace'),
        'section'  => 'naturespace_footer_color_settings',
        'settings' => 'naturespace_footer_notices_links_color',
    )));
    
    //  ==========================================
    //  = Searchform border color                =
    //  ==========================================
    $wp_customize->add_setting('naturespace_searchform_border_color', array(
        'default'           => get_option('naturespace_searchform_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_searchform_border_color_control', array(
        'label'    => __('Searchform border color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_searchform_border_color',
    )));
    
    //  ==========================================
    //  = Search Icon color                      =
    //  ==========================================
    $wp_customize->add_setting('naturespace_searchform_button_background_color', array(
        'default'           => get_option('naturespace_searchform_button_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_searchform_button_background_color_control', array(
        'label'    => __('Search Icon color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_searchform_button_background_color',
    )));
    
    //  ==========================================
    //  = Search Icon hover color                =
    //  ==========================================
    $wp_customize->add_setting('naturespace_searchform_button_hover_color', array(
        'default'           => get_option('naturespace_searchform_button_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_searchform_button_hover_color_control', array(
        'label'    => __('Search Icon hover color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_searchform_button_hover_color',
    )));
    
    //  ==========================================
    //  = Form Fields background color           =
    //  ==========================================
    $wp_customize->add_setting('naturespace_form_fields_background_color', array(
        'default'           => get_option('naturespace_form_fields_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_form_fields_background_color_control', array(
        'label'    => __('Form Fields background color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_form_fields_background_color',
    )));
    
    //  ==========================================
    //  = Form Fields border color               =
    //  ==========================================
    $wp_customize->add_setting('naturespace_form_fields_border_color', array(
        'default'           => get_option('naturespace_form_fields_border_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_form_fields_border_color_control', array(
        'label'    => __('Form Fields border color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_form_fields_border_color',
    )));
    
    //  ==========================================
    //  = Buttons background color               =
    //  ==========================================
    $wp_customize->add_setting('naturespace_form_buttons_background_color', array(
        'default'           => get_option('naturespace_form_buttons_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_form_buttons_background_color_control', array(
        'label'    => __('Buttons background color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_form_buttons_background_color',
    )));
    
    //  ==========================================
    //  = Buttons hover color                    =
    //  ==========================================
    $wp_customize->add_setting('naturespace_form_buttons_hover_color', array(
        'default'           => get_option('naturespace_form_buttons_hover_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_form_buttons_hover_color_control', array(
        'label'    => __('Buttons hover color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_form_buttons_hover_color',
    )));
    
    //  ==========================================
    //  = Table Headers background color         =
    //  ==========================================
    $wp_customize->add_setting('naturespace_table_headers_background_color', array(
        'default'           => get_option('naturespace_table_headers_background_color', ''),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'naturespace_sanitize_text',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'naturespace_table_headers_background_color_control', array(
        'label'    => __('Table Headers background color', 'naturespace'),
        'section'  => 'naturespace_html_color_settings',
        'settings' => 'naturespace_table_headers_background_color',
    )));
}
 
add_action('customize_register', 'naturespace_customize_register');

/**
 * Sanitize URIs
*/
function naturespace_sanitize_uri($uri) {
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize Texts
*/
function naturespace_sanitize_text($str) {
	if('' === $str){
		return '';
	}
	return sanitize_text_field($str);
} ?>