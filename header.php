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

                <?php wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container'       => 'nav',
                    'container_class' => 'header__row',
                )); ?>

                <div class="header__row">
                    <img src="assets/img/logo.svg" alt="Школа радости" class="header__logo">
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

		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$mbounosh43_description = get_bloginfo( 'description', 'display' );
			if ( $mbounosh43_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $mbounosh43_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
