<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mbounosh43
 */

?>

<footer class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__column">
                Информация, размещенная на сайте, соответствует
                Правилам размещения на официальном сайте образовательной
                организации в информационно-телекоммуникационной сети "Интернет"
                и обновления информации обобразовательной организации,
                утвержденным Постановлением Правительства Российской Федерации
                от 10 июля 2013 г. № 582
            </div>
            <div class="footer__column">
                <div class="footer__address">Адрес:
                    <?php
                    $tel = get_option('site_address');
                    if($tel != null){ ?>
                        <?php echo get_option('site_address'); ?>
                    <?php } ?>
                </div>
                <div class="footer__phone-mail">Телефон: <a class="footer-link" href="tel:<?php $tel = get_option('site_telephone'); if($tel != null){ ?><?php echo get_option('site_telephone'); ?><?php } ?>">
                        <?php
                        $tel = get_option('site_telephone');
                        if($tel != null){ ?>
                            <?php echo get_option('site_telephone'); ?>
                        <?php } ?>
                    </a>.
                    <span class="footer__mail">Электронная почта:
                        <a class="footer-link" href="mailto:<?php $contact_inf = get_option('theme_contacttext'); if($contact_inf != null){ ?><?php echo $contact_inf; ?><?php } ?>">
                            <?php
                            $contact_inf = get_option('theme_contacttext');
                            if($contact_inf != null){ ?>
                                <?php echo $contact_inf; ?>
                            <?php } ?>
                        </a></span>
                </div>
                <div class="footer__politics"><a class="footer-link" href="mbounosh43.ru/wp-content/uploads/politika.pdf">Политика конфиденциальности</a></div>
                <div class="footer__agreement"><a class="footer-link" href="mbounosh43.ru/wp-content/uploads/soglashenie.pdf">Пользовательское соглашение</a></div>
            </div>
            <div class="footer__column">
                <a href="https://csys.su/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo__comsys.png" alt="Комсис"></a>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
