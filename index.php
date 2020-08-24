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

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
