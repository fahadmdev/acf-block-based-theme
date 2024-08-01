<?php

$terms = get_field('card_query_term');
$term_names = array();
if ($terms != null) {
    foreach ($terms as $term) {
        $term_names[] = $term->slug;
    }
}


$service_posts = servceQueryTerms($term_names);

$Section_title = get_field('section_title');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}

?>


<section class="featured-cards padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php if (!empty($Section_title)) { ?>
                <?php echo $Section_title ?>
            <?php } ?>
            <?php if (get_field('service_from_service_post_type') == true) : ?>
                <div class="row cards-listing gy-4">
                    <?php if ($service_posts->have_posts()) : ?>
                        <?php while ($service_posts->have_posts()) : $service_posts->the_post(); ?>
                            <div class="col-lg-6 col-sm-6">
                             
                                <div class="single animate-border">
                                <div class="yellow-effects">
                                    <a href="<?php echo get_permalink(); ?>">
                                        <div class="icon">
                                            <img src="<?php echo get_field('services_icon', get_the_ID()); ?>" />
                                        </div>
                                        <h4 class="title"><?php echo get_the_title(); ?></h4>
                                        <div class="description">
                                            <?php echo wp_trim_words(get_the_content(), 20, '...');; ?>
                                        </div>
                                    </a>
                                </div>
                                </div>
                              

                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <div class="row cards-listing gy-4">
                    <?php if (have_rows('feature_cards_content_repeater')) : ?>
                        <?php while (have_rows('feature_cards_content_repeater')) : the_row(); ?>
                            <div class="col-lg-6 col-sm-6">
                               

                                    <div class="single animate-border">
                                         <div class="yellow-effects">
                                        <div class="icon">
                                            <img src="<?php the_sub_field('feature_card_image'); ?>" />
                                        </div>
                                        <h4 class="title"><?php the_sub_field('feature_card_title'); ?></h4>
                                        <div class="description">
                                            <?php the_sub_field('feature_card_description'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
