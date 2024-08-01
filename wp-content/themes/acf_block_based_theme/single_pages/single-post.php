<?php get_header(); ?>

<?php

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <div class="container">
                    <div class="post-head text-center">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <?php if (!empty(get_the_excerpt())) : ?>
                            <p><?php echo get_the_excerpt(); ?></p>
                        <?php else : ?>
                            <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                        <?php endif ?>

                    </div>
                    <div class="post-image">
                        <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                        <div class="social-share-icons">
                            <?php echo do_shortcode('[miniorange_social_sharing]');
                            ?>
                            <a id="share-to-icon" href="javascript:void(0)"> <i class="fa-duotone fa-solid fa-share-nodes"></i></a>
                        </div>

                    </div>
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Notification</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                URL copied to clipboard!
                            </div>
                        </div>
                    </div>
                    <?php echo get_field('blog_details') ?>




                    <?php
                    $terms = get_the_terms(get_the_ID(), 'category');
                    if ($terms && !is_wp_error($terms)) :
                        $term_links = array();
                        foreach ($terms as $term) {
                            $args = array(
                                'post_type' => 'post',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field'    => 'slug',
                                        'terms'    => $term->slug,
                                    ),
                                ),
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            );

                            $blog_posts = new WP_Query($args);
                            $term_links[] = '<a href="' . get_term_link($term) . '">' . $term->name . '</a>';
                        }
                        echo implode(', ', $term_links);
                    else :
                        echo 'No categories assigned.';
                    endif;
                    ?>

                </div>
            </div>
            <!-- releated Blogs -->
            <div class="posts-listing-wrapper padding">
                <div class="container">
                    <div class="inner">
                        <h2>Related<br> <span class="fill-primary">Blogs</span></h2>
                        <div class="post-listing row">
                            <?php if ($blog_posts->have_posts()) : ?>
                                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                                    <div class="col-xl-4 col-lg-4 col-md-3 col-sm-6 ">
                                        <a href="<?php echo get_permalink(); ?>" class="post">
                                            <?php if (!empty((get_the_post_thumbnail(get_the_ID())))) { ?>
                                                <div class="post-thumbnail mb-3">
                                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                                </div>
                                            <?php } ?>
                                            <div class="post-text">
                                                <h4><?php echo get_the_title(); ?></h4>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile;

                                wp_reset_postdata(); ?>

                            <?php endif; ?>
                        </div>
                        <div class="cta-btn-wrapper mt-5 text-end">
                            <a href="<?php echo esc_url(home_url('/blog')); ?>" class="icon-btn">See More</a>
                        </div>
                    </div>
                </div>
            </div>




        </article>

<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>