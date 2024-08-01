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
    'post_type' => 'project', // Replace 'your-post-type' with the slug of your custom post type
    'posts_per_page' => -1, // Set the number of posts to retrieve. Use -1 to retrieve all posts.

);

$posts = new WP_Query($args);
?>

<main id="primary" class="site-main">
    <div>
        <!-- hero Section  -->
        <section class="inner-page-hero ">
        <div id="particles-js"></div>
            <div class="container">

                <?php echo get_field('project_svg_icon', 'option') ?>

                <div class="inner text-center search-page">

                    <?php echo get_field('project_hero_section_title', 'option') ?>
                </div>
            </div>
        </section>
        <!--post listing section  -->
        <section class="projects ">
            <div class="container">
                <div class="inner">

                    <div class="project-cards row gy-4">
                        <?php if ($posts->have_posts()) : ?>
                            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                                <div class="col-lg-6 single">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="card-content">
                                            <div class="card-thumbnail">
                                                <img src="<?php echo get_field('project_thumbnail', get_the_ID()) ?>" />
                                            </div>
                                            <div class="card-overlay">
                                                <h3><?php echo get_the_title(); ?></h3>
                                                <?php if (!empty(get_the_excerpt())) : ?>
                                                    <p><?php echo get_the_excerpt(); ?></p>
                                                <?php else : ?>
                                                    <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                                                <?php endif ?>
                                                <span class="icon-btn d-xl-none">Preview</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
