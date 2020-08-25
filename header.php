<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mbounosh43
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,200,400,300,500,400italic,500italic,700,700italic,100&subset=latin,cyrillic'
          rel='stylesheet' type='text/css'>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mbounosh43' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="header__back">
            <div class="container">
                <nav class="header__row">
                    <input id="menu-toggle" type="checkbox"/>
                    <label class="menu-btn" for="menu-toggle">
                        <span></span>
                    </label>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'container'       => '',
                        'container_class' => '',
                        'menu_class'      => 'top-menu',
                        'menu_id'         => 'nav',
                    )); ?>
                </nav>

                <div class="header__row">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Школа радости" class="header__logo">
                    </a>
                    <div class="header__column">
                        <div class="header__name">
                            Муниципальное автономное общеобразовательное учреждение начальная общеобразовательная школа №43
                        </div>
                        <div class="header__info">
                            <div class="header__address">622048, обл. Свердловская, г. Нижний Тагил, ул. Зари, д. 30</div>
                            <div class="header__phone-mail">Телефон: <a href="tel:+73435310408">8 (3435) 31-04-08</a>.
                                Электронная почта:
                                <a href="mailto:skhool43@yandex.ru">skhool43@yandex.ru</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
	</header><!-- #masthead -->
