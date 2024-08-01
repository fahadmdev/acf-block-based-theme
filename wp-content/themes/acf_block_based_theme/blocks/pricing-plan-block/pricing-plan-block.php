<?php
$agrs = array(
    'posts_per_page' => 4,
    'post_type'      => 'pricing-plan',
    'orderby'        => 'pricing_plan_feature', // Order by custom field value
    'order'          => 'DESC',
    'meta_key'       => 'pricing_plan_feature',
);


$pricing_plan_posts = new WP_Query($agrs);
$pricing_section_title = get_field('pricing_plan_section_title');
$pricing_section_description = get_field('pricing_plan_section_description');

// want to get class name from block use this variable
$className = '';

$terms = get_field('expertise_relation_with_pricing_plan');




if (!empty($block['className'])) {
    $className = $block['className'];
}
$pricing_plan_button_target = "";
$pricing_plan_button_url = "";
$pricing_plan_button_title = "";
$pricing_plan_section_CTA = get_field('pricing_plan_section_cta');
if ($pricing_plan_section_CTA) {
    $pricing_plan_button_url = $pricing_plan_section_CTA['url'];
    $pricing_plan_button_title = $pricing_plan_section_CTA['title'];
    $pricing_plan_button_target = $pricing_plan_section_CTA['target'] ?: '_self';
}




?>

<section class="pricing-plan padding  <?php echo $className ?>" id="dt-pricing-plan">
    <div class="container">
        <div class="inner row">
            <div class="col-lg-5">
                <div class="pricing-text">
                    <?php echo $pricing_section_title ?>
                    <div class="description mb-5"><?php echo $pricing_section_description ?></div>
                    <a href="<?php echo esc_url(home_url('/packages')); ?>" class="icon-btn d-none d-lg-inline-flex"><?php echo $pricing_plan_button_title ?></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="pricing-cards row gy-4">
                    <?php if ($pricing_plan_posts->have_posts()) : ?>
                        <?php while ($pricing_plan_posts->have_posts()) : $pricing_plan_posts->the_post(); ?>
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
                                <div class="single">
                                    <a href="<?php echo esc_url($term_link); ?>">
                                        <h4><?php echo get_the_title(); ?></h4>
                                        <div class="description">
                                            <?php if (!empty(get_the_excerpt())) : ?>
                                                <p><?php echo get_the_excerpt(); ?></p>
                                            <?php else : ?>
                                                <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                                            <?php endif ?>
                                        </div>
                                        <div class="single-footer">
                                            <p>Price: <span class="fill-primary"><?php echo esc_html(get_field('plan_card_price', get_the_ID())) ?>/<?php echo esc_html(get_field('plan_card_estimate_time', get_the_ID())) ?></span></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
            <a href="<?php echo esc_url(home_url('/packages')); ?>" class="icon-btn d-inline-flex d-lg-none mt-3 mx-2" style="width: fit-content;"><?php echo $pricing_plan_button_title ?></a>
        </div>
    </div>
</section>