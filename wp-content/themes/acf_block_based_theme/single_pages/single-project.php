<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="container">
                <div class="entry-content">
                    <div class="post-head text-center service-detail ">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php if (!empty(get_the_excerpt())) : ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        <?php else : ?>
                            <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                        <?php endif ?>

                    </div>

                </div>

                <div class="project-overview">
                    <h2>Project <span class="fill-primary"> <br> Overview </span></h2>
                    <!-- image Slider -->
                    <?php if (have_rows('project_image_slider', get_the_ID())) : ?>

                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php while (have_rows('project_image_slider', get_the_ID())) : the_row(); ?>
                                    <?php
                                    $image = get_sub_field('project_image', get_the_ID());

                                    // Check if $image is not false and is an array
                                    if ($image && is_array($image)) {
                                        $url = $image['url'];
                                        $alt = $image['alt'];
                                        $title = $image['title'];
                                        $caption = $image['caption'];
                                    } else {
                                        $url = '';
                                        $alt = '';
                                        $title = '';
                                        $caption = '';
                                    }
                                    ?>
                                    <?php if (get_sub_field('project_image')) : ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($alt); ?>" />
                                        </div>
                                    <?php endif ?>
                                <?php endwhile; ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    <?php endif; ?>
                    <!-- Project Details -->
                    <?php echo get_field('project_details') ?>


                </div>

                <div class="entry-content">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'projects-category');
                    if ($terms && !is_wp_error($terms)) :
                        $term_links = array();
                        foreach ($terms as $term) {
                            $agrs = array(
                                'posts_per_page'    => -1,
                                'post_type'     => 'project',
                                array(
                                    'taxonomy' => 'services-category',
                                    'field'    => 'slug',
                                    'terms'    => $term->slug,
                                ),

                                'orderby'        => 'date',
                                'order'          => 'DESC',

                            );
                            $project_posts = new WP_Query($agrs);
                        }
                        echo implode(', ', $term_links);
                    else :
                        echo 'No categories assigned.';
                    endif;
                    ?>

                </div>


                <div>

                    <?php if ($project_posts != null) : ?>
                        <section class="projects ">
                            <h2>Our<br> Recent <span class="fill-primary">Projects</span></h2>
                            <div class="container">
                                <div class="inner">

                                    <div class="project-cards row gy-4">
                                        <?php if ($project_posts->have_posts()) : ?>
                                            <?php while ($project_posts->have_posts()) : $project_posts->the_post(); ?>
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
                                    <div class="cta-btn-wrapper mt-5 d-flex">
                                        <a href="<?php echo esc_url(home_url('/projects')); ?>" class="icon-btn ms-auto">See More</a>
                                    </div>
                                </div>
                            </div>
                        </section>

                    <?php endif ?>
                    <?php display_newsletter_banner(); ?>

                </div>

            </div>

            </div>

            <footer class="entry-footer">
            </footer>
            <!-- <nav class="post-navigation">
                <div class="nav-previous"><?php previous_post_link('%link', 'Previous Post: %title'); ?></div>
                <div class="nav-next"><?php next_post_link('%link', 'Next Post: %title'); ?></div>
            </nav> -->
        </article>

<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>