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
    'post_type' => 'pricing-plan', // Replace 'your-post-type' with the slug of your custom post type
    'posts_per_page' => -1, // Set the number of posts to retrieve. Use -1 to retrieve all posts.

);

$posts = new WP_Query($args);
?>

<main id="primary" class="site-main">
    <div>
        <!-- Hero Section -->
        <section class="inner-page-hero ">
        <div id="particles-js"></div>
            <div class="container">

                <?php echo get_field('pricing_plan_svg_icon', 'option') ?>

                <div class="inner text-center search-page">

                    <?php echo get_field('pricing_plan_hero_section_title', 'option') ?>
                </div>
            </div>
        </section>
        <!-- Post listing action -->
        <section class="featured-cards padding <?php echo $className ?>">
            <div class="container">
                <div class="inner">
                    <div class="row cards-listing gy-4">
                        <?php if ($posts->have_posts()) : ?>
                            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                                <?php

                                $term_link = ''; // Initialize to empty string
                                $terms = get_the_terms(get_the_ID(), 'expertise');
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        $term_link = get_term_link($term);
                                        break;
                                    }
                                }

                                ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="single animate-border">
                                        <div class="yellow-effects">
                                            <a href="<?php echo esc_url($term_link); ?>">

                                                <h4 class="title"><?php echo get_the_title(); ?></h4>
                                                <div class="description">
                                                    <?php echo wp_trim_words(get_the_content(), 20, '...');; ?>
                                                </div>
                                                <div class="single-footer">
                                                    <p>Price: <span class="fill-primary"><?php echo esc_html(get_field('plan_card_price', get_the_ID())) ?></span></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>



                </div>
            </div>
        </section>



</main><!-- #main -->

<?php
get_sidebar();
get_footer();
