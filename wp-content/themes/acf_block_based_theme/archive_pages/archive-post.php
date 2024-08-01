<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acf_based_custom_theme
 */

get_header();

$taxonomy = get_queried_object();

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,

);

$posts = new WP_Query($args);
?>

<main id="primary" class="site-main">
    <div>
        <!-- hero Section -->
        <section class="inner-page-hero ">
        <div id="particles-js"></div>
            <div class="container">

                <?php echo get_field('blog_section_svg_icon', 'option') ?>

                <div class="inner text-center search-page">

                    <?php echo get_field('blog_hero_section_title', 'option') ?>
                </div>
            </div>
        </section>
        <!-- Post Listing Section -->


        <section class="posts-listing-wrapper padding <?php echo $className ?>">
            <div class="container">
                <div class="inner">

                    <div class="post-listing row gy-4">
                        <?php if ($posts->have_posts()) : ?>
                            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                                <div class="col-lg-4">
                                    <a href="<?php echo get_permalink(); ?>" class="post mb-3 mb-lg-0">
                                        <?php if (!empty((get_the_post_thumbnail(get_the_ID())))) { ?>
                                            <div class="post-thumbnail mb-3">
                                                <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                            </div>
                                        <?php } ?>
                                        <div class="post-text">
                                            <h4><?php echo get_the_title(); ?></h4>
                                            <?php if (!empty(get_the_excerpt())) : ?>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            <?php else : ?>
                                                <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                                            <?php endif ?>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;

                            wp_reset_postdata(); ?>

                        <?php endif; ?>
                    </div>
                    <div class="cta-btn-wrapper mt-5 text-end">
                    </div>
                </div>
            </div>
        </section>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
