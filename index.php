<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mbounosh43
 */

get_header();
?>

	<main id="primary" class="site-main">
        <div class="container">
            <div class="slide-wrapper">
                <div class="owl-carousel owl-theme" id="owl-carousel1">
                    <div class="slide-item slide1">

                    </div>
                    <div class="slide-item slide1">

                    </div>
                </div>
            </div>
        </div>
        <div class="container-narrow">
            <div class="news">
                <div class="news__title">Новости</div>
                <div class="news__item-list">

                    <?php
                    // параметры по умолчанию
                    $args = array(
                        'numberposts' => 6,
                        'post_type'   => 'post',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) ;

                    $posts = get_posts( $args );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        ?>
                        <a href="<?php the_permalink(); ?>" class="news__item-frame">
                            <div class="news__item">
                                <div class="news__img">
                                    <?php the_post_thumbnail ('news-thumb')?>
                                </div>
                                <div class="news__info">
                                    <div class="news__item-title"><?php the_title(); ?></div>
                                    <div class="news_date"><?php the_time('F jS, Y') ?></div>
                                </div>
                            </div>
                        </a>
                        <?php
                    }

                    wp_reset_postdata(); // сброс

                    ?>

                </div>
                <a href="category/novosti" class="news__more">Еще новости</a>
            </div>
        </div>
        <div class="additional-items">
            <div class="container">
                <div class="additional-items__title">
                    Дополнительные предметы и секции
                </div>
                <div class="additional-items__item-list">
                    <?php
                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts' => 6,
                        'order'       => 'ASC',
                        'post_type'   => 'additional',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        ?>
                        <a href="<?php the_permalink(); ?>" class="additional-items__item-frame">
                            <div class="additional-items__item">
                                <div class="additional-items__img">
                                    <?php the_post_thumbnail ('additional-thumb')?>
                                </div>
                                <div class="additional-items__info">
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </a>
                        <?php
                    }

                    wp_reset_postdata(); // сброс
                    ?>
                </div>
            </div>
        </div>
        <div class="links">
            <div class="container">
                <div class="links__title">Ссылки</div>
                <div class="links__item-list">
                    <a href="https://www.minobrnauki.gov.ru/" target="_blank" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo1.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">Официальный сайт</div>
                                    <div class="links__info">Министерство образования Российской Федерации</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo2.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">Официальный сайт</div>
                                    <div class="links__info">Министерство образования и молодежной политики Свердловской
                                        области
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo3.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">Официальный сайт</div>
                                    <div class="links__info">Администрации города Нижний Тагил</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo4.jpg" alt="Логотип">
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo5.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">Официальный сайт</div>
                                    <div class="links__info">Федеральный центр информационно-образовательных ресурсов</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo6.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">Официальный информационный портал</div>
                                    <div class="links__info">Единого государственного экзамена</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo7.jpg" alt="Логотип">
                            </div>
                            <div class="link__text">
                                <div class="links__text-center">
                                    <div class="links__text-title">ФЕДЕРАЛЬНЫЙ ПОРТАЛ</div>
                                    <div class="links__info">Российское образование</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="links__item-frame">
                        <div class="links__item">
                            <div class="links__img">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/links__logo8.jpg" alt="Логотип">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--<div class="links">
            <div class="container">
                <div class="links__title">Ссылки</div>
                <div class="links__item-list">
                    <?php
/*                    // параметры по умолчанию
                    $posts = get_posts( array(
                        'numberposts' => 0,
                        'order'       => 'ASC',
                        'post_type'   => 'links',
                        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        */?>

                        <a href="<?php /*the_permalink(); */?>" class="links__item-frame">
                            <div class="links__item">
                                <div class="links__img">
                                    <?php /*the_post_thumbnail ('additional-thumb')*/?>
                                </div>
                                <div class="link__text">
                                    <div class="links__text-center">
                                        <div class="links__text-title"><?php /*the_title(); */?></div>
                                        <div class="links__info"><?php /*the_content(); */?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php
/*                    }

                    wp_reset_postdata(); // сброс
                    */?>



                </div>
            </div>
        </div>-->
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
