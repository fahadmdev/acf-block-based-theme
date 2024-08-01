<?php
$args = array(
    'posts_per_page'    => 1,
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => 'feature',
        ),
    ),
    'orderby'        => 'date',
    'order'          => 'DESC',
);

$blog_posts = new WP_Query($args);

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}

?>
<section class="single-featured-blog <?php echo $className ?>">
    <div class="container">
        <?php if ($blog_posts->have_posts()) : ?>
            <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                <div class="inner animate-border">
                    <a href="<?php echo get_permalink(); ?>" class="post-card p-1">
                        <div class="row g-0 align-items-center">
                            <div class="col-lg-4">
                                <div class="post-image">
                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="post-detail py-3 px-4">
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <?php if (!empty(get_the_excerpt())) : ?>
                                        <p><?php echo get_the_excerpt(); ?></p>
                                    <?php else : ?>
                                        <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
</section>