<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package acf_based_custom_theme
 */

get_header();

// Query arguments to get all posts of custom post type 'team'
$args = array(
    'post_type' => 'team',
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

                <?php echo get_field('team_svg_icon', 'option') ?>

                <div class="inner text-center search-page">

                    <?php echo get_field('team_hero_section_title', 'option') ?>
                </div>
            </div>
        </section>
        <section class="team padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            
            <div class="team-listing row gy-4">
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <a class="single" href="<?php echo get_permalink(); ?>">
                                <div class="card-thumbnail">
                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                </div>
                                <h5><?php echo get_the_title(); ?></h5>
                                <p>
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'designation');
                                    if ($terms && !is_wp_error($terms)) {
                                        $term_names = array();
                                        foreach ($terms as $term) {
                                            $term_names[] = $term->name;
                                        }
                                        echo implode(', ', $term_names);
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </p>
                            </a>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="cta-btn-wrapper mt-5 text-end">
                   
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>