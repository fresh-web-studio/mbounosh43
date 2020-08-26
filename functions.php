<?php
/**
 * mbounosh43 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mbounosh43
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'mbounosh43_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mbounosh43_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mbounosh43, use a find and replace
		 * to change 'mbounosh43' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mbounosh43', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        /**
         * Добавляю свои миниатюры для Новостей на главной странице и на странице новостей.
         */
        add_image_size(
            'news-thumb', 300, 300, true
        );
        add_image_size(
            'additional-thumb', 342, 213, true
        );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(

			array(
                'top-menu' => __( 'top-menu', 'mbounosh43' ),
                'left-menu' => __( 'left-menu', 'mbounosh43' ),

			)
		);

        /**
         * удаляет H2 из шаблона пагинации
         */
        add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
                function my_navigation_template( $template, $class ){
                    /*
                    Вид базового шаблона:
                    <nav class="navigation %1$s" role="navigation">
                        <h2 class="screen-reader-text">%2$s</h2>
                        <div class="nav-links">%3$s</div>
                    </nav>
                    */

                    return '
            <div class="container posts">
                <nav class="navigation %1$s" role="navigation">
                    <div class="nav-links">%3$s</div>
                </nav>
            </div>
                
            ';
                }

        // выводим пагинацию
                the_posts_pagination( array(
                    'end_size' => 2,
                ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
    )
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mbounosh43_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'mbounosh43_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mbounosh43_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mbounosh43_content_width', 640 );
}
add_action( 'after_setup_theme', 'mbounosh43_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/*function mbounosh43_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mbounosh43' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mbounosh43' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mbounosh43_widgets_init' );*/

/**
 * Enqueue scripts and styles.
 */
function mbounosh43_scripts() {
	wp_enqueue_style( 'mbounosh43-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'mbounosh43-style-owl.carousel', get_template_directory_uri() . '/owlcarousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'mbounosh43-style-owl.theme.default', get_template_directory_uri() . '/owlcarousel/assets/owl.theme.default.css' );
	wp_style_add_data( 'mbounosh43-style', 'rtl', 'replace' );

    wp_deregister_script('jquery');
    wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"), false, '3.4.1', true);
    wp_enqueue_script('jquery');

	wp_enqueue_script( 'mbounosh43-owl.carousel', get_template_directory_uri() . '/owlcarousel/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'mbounosh43-main_slider', get_template_directory_uri() . '/assets/js/main_slider.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mbounosh43_scripts' );

/**
 * Создаю свой тип записей для вывода "Дополнительных предметов и секций (additional)
 * */

add_action( 'init', 'register_post_types' );
function register_post_types(){
    register_post_type( 'additional', [
        'label'  => null,
        'labels' => [
            'name'               => 'Факультатив', // основное название для типа записи
            'singular_name'      => 'Факультатив', // название для одной записи этого типа
            'add_new'            => 'Добавить факультатив', // для добавления новой записи
            'add_new_item'       => 'Добавление факультатива', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование факультатива', // для редактирования типа записи
            'new_item'           => 'Новый факультатив', // текст новой записи
            'view_item'          => 'Смотреть факультатив', // для просмотра записи этого типа.
            'search_items'       => 'Искать факультатив', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Факультативы', // название меню
        ],
        'description'         => 'Факультативы - это дополнительные занятия для детей. Например: секции баскетбола, шашки и т.д.',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-welcome-learn-more',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor','thumbnail','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
/////Создаю свой тип записей для вывода "Ссылки (links) "
/*add_action( 'init', 'register_post_types_links' );
function register_post_types_links(){
    register_post_type( 'links', [
        'label'  => null,
        'labels' => [
            'name'               => 'Ссылки', // основное название для типа записи
            'singular_name'      => 'Ссылка', // название для одной записи этого типа
            'add_new'            => 'Добавить ссылку', // для добавления новой записи
            'add_new_item'       => 'Добавление ссылку', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование ссылки', // для редактирования типа записи
            'new_item'           => 'Новая ссылка', // текст новой записи
            'view_item'          => 'Смотреть ссылку', // для просмотра записи этого типа.
            'search_items'       => 'Искать ссылку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Ссылки', // название меню
        ],
        'description'         => 'Ссылки для главной страницы для перехода на официальные сайты',
        'public'              => true,
        'publicly_queryable'  => true, // зависит от public
        'exclude_from_search' => true, // зависит от public
        'show_ui'             => true, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        'show_in_admin_bar'   => true, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-admin-links',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor','thumbnail','post-formats' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Вывод контактных данных через настойки темы
 */
/**
 * Добавляет блок для ввода контактных данных
 */
function mbounosh43_contacts_customize_register( $wp_customize ) {
    /*
    Добавляем секцию в настройки темы
    */
    $wp_customize->add_section(
// ID
        'data_site_section',
// Массив аргументов
        array(
            'title' => 'Контактные данные для сайта',
            'capability' => 'edit_theme_options',
            'description' => "Тут можно указать контактные данные")
    );
    /*
    Добавляем поле контактных данных
    */
    $wp_customize->add_setting(
// ID
        'theme_contacttext',
// Массив аргументов
        array(
            'default' => '',
            'type' => 'option'
        )
    );
    $wp_customize->add_control(
// ID
        'theme_contacttext_control',
// Массив аргументов
        array(
            'type' => 'text',
            'label' => "Электронная почта",
            'section' => 'data_site_section',
            'settings' => 'theme_contacttext'
        )
    );
    /*
    Добавляем поле телефона site_telephone
    */
    $wp_customize->add_setting(
    // ID
        'site_telephone',
    // Массив аргументов
        array(
            'default' => '',
            'type' => 'option'
        )
    );
    $wp_customize->add_control(
    // ID
        'site_telephone_control',
    // Массив аргументов
        array(
            'type' => 'text',
            'label' => "Текст с телефоном",
            'section' => 'data_site_section',
            'settings' => 'site_telephone'
        )
    );
    /*
    Добавляем поле адреса site_address
    */
    $wp_customize->add_setting(
    // ID
        'site_address',
    // Массив аргументов
        array(
            'default' => '',
            'type' => 'option'
        )
    );
    $wp_customize->add_control(
    // ID
        'site_address_control',
    // Массив аргументов
        array(
            'type' => 'text',
            'label' => "Адрес",
            'section' => 'data_site_section',
            'settings' => 'site_address'
        )
    );
}
add_action( 'customize_register', 'mbounosh43_contacts_customize_register' );

/**
 * КОНЕЦ Вывод контактных данных через настойки темы
 **/