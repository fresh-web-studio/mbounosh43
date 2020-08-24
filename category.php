<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
                    <?php if(have_posts()) {
                        while (have_posts()) {
                            the_post(); ?>
                            <a href="<?php the_permalink(); ?>" class="news__item-frame">
                                <div class="news__item">
                                    <div class="news__img">
                                        <?php the_post_thumbnail ('thumbnail')?>
                                    </div>
                                    <div class="news__info">
                                        <div class="news__item-title"><?php the_title(); ?></div>
                                        <div class="news_date"><?php the_time('F jS, Y') ?></div>
                                    </div>
                                </div>
                            </a>
                        <?php
                        } //конец while
                        ?>
                        <?php the_posts_pagination(); ?>
                        <!--<nav class="news__pagination">
                            <ul>
                                <li>

                                </li>
                            </ul>
                        </nav>-->
                    <?php
                    }//конец if
                    ?>
                </div>
            </div>
        </div>
    </main><!-- #main -->
<?php
get_sidebar();
get_footer();
