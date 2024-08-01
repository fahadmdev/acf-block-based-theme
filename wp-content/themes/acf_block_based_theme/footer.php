<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package acf_based_custom_theme
 */

//get_template_part( 'template-parts/content', 'banner_cta' );

wp_footer();
$footer_section_description = get_field('footer_section_description', 'option');
$footer_section_phone_number = get_field('footer_section_phone_number', 'option');
$footer_section_email = get_field('footer_section_email', 'option');

?>

<footer class="footer">
    <div class="container">
        <div class="inner">
            <div class="footer__top">
                <div class="footer__social">
                    <?php the_custom_logo(); ?>
                    <div class="d-flex flex-column align-items-center mb-3">
                        <p><?php echo $footer_section_description ?></p>
                        <a href="tel:<?php echo $footer_section_phone_number ?>"><?php echo $footer_section_phone_number ?></a>
                        <a href="mailto:<?php echo $footer_section_email ?>"><?php echo $footer_section_email ?></a>
                    </div>
                    <div class="footer__social--links">
                        <?php if (have_rows('footer_section_social_icons_repater', 'option')) : ?>
                            <?php while (have_rows('footer_section_social_icons_repater', 'option')) : the_row(); ?>
                                <?php
                                $social_icon = get_sub_field('footer_social_icon');
                                $social_url = get_sub_field('footer_section_social_url');
                                ?>
                                <a href="<?php echo esc_url($social_url); ?>" class="fa-brands "><?php echo $social_icon ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="footer__locations">
                    <h4>Locations</h4>
                    <?php if (have_rows('footer_section_address_repeater', 'option')) : ?>
                        <?php while (have_rows('footer_section_address_repeater', 'option')) : the_row(); ?>
                            <?php
                            $country_name = get_sub_field('footer_section_country_name');
                            $address = get_sub_field('footer_section_address');
                            ?>
                            <p><strong class="fill-primary"><?php echo $country_name ?></strong><?php echo $address ?></p>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <div class="footer__links">
                    <h4>Site Links</h4>
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="copyright__text">
                    <small>
                        <?php echo get_field('footer_copy_right_text','option') ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

</html>