<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page'    => 12,
    'post_type' => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged' => $paged
);

$blog_posts = new WP_Query($args);
$blog_section_title = get_field('blog_section_title');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}

?>
<section class="posts-listing-wrapper padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $blog_section_title ?>
            <div class="post-listing row gy-4">
                <?php if ($blog_posts->have_posts()) : ?>
                    <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                        <div class="col-xl-4 col-lg-4  col-sm-6 ">
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
                <nav class="pagination">
                    <?php
                    echo paginate_links(array(
                        'total' => $blog_posts->max_num_pages,
                        'prev_text' => __('« Prev'),
                        'next_text' => __('Next »'),
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
</section>