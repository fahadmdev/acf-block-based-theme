<?php get_header(); ?>

<?php

if (have_posts()) :
    while (have_posts()) : the_post();
        //  this be too Removed

        // $service_post_objects = get_field('service_releation_price_plan');

        // Initialize variables
        // $pricing_plan_title = '';
        // $pricing_plan_link = '';
        // $pricing_plan_time = '';
        // $pricing_plan_price = '';

        // if ($service_post_objects) {
        //     foreach ($service_post_objects as $service_post_object) {
        //         if (is_int($service_post_object)) {
        //             $service_post_object = get_post($service_post_object);
        //         }

        //         if ($service_post_object && is_object($service_post_object)) {
        //             $pricing_plan_link = get_permalink($service_post_object->ID);
        //             $pricing_plan_title = get_the_title($service_post_object->ID);
        //             $pricing_plan_time = get_field('plan_card_estimate_time', $service_post_object->ID);
        //             $pricing_plan_price = get_field('plan_card_price', $service_post_object->ID);
        //         }
        //     }
        // }
?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Description -->
            <div class="entry-content">
                <div class="post-head text-center">
                   <div class="container">
                   <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if (!empty(get_the_excerpt())) : ?>
                        <p><?php echo get_the_excerpt(); ?></p>
                    <?php else : ?>
                        <p><?php echo wp_trim_words(get_the_content(), 20, '...');; ?></p>
                    <?php endif ?>
                   </div>
                </div>
                <?php if (get_field('single_service_page_details')) : ?>
                    <div class="container">

                        <?php echo get_field('single_service_page_details') ?>

                    </div>
                <?php endif ?>
                <!-- Service Details -->



                <?php if (have_rows('faq_accordion', get_the_ID())) : ?>
                    <section class="faqs padding">
                        <div class="container">
                            <div class="inner">
                                <h2>FAQs</h2>
                                <div class="accordion" id="faqAccordion">
                                    <?php
                                    $counter = 0;
                                    while (have_rows('faq_accordion', get_the_ID())) : the_row();
                                        $counter++;
                                        $collapse_id = 'faqAccordionCollapse' . $counter;
                                        $header_id = 'faq' . $counter;
                                    ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="<?php echo $header_id; ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_id; ?>">
                                                    <span class="pe-3"><?php echo get_sub_field('accordion_title', get_the_ID()) ?></span>
                                                    <i class="fa-solid fa-arrow-right ms-auto"></i>
                                                </button>
                                            </h2>
                                            <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $header_id; ?>" data-bs-parent="#faqAccordion">
                                                <div class="accordion-body">
                                                    <?php echo get_sub_field('accordion_description', get_the_ID()) ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

            </div>
            <!-- Releted Price Plan too be removed -->
            <?php //if (!empty($pricing_plan_title)) : 
            ?>
            <!-- <section class="pricing-plan padding ">
                    <div class="container">
                        <div class="inner row">
                            <div class="col-xl-5">
                                <div class="pricing-text">
                                    <?php //echo get_field('pricing_plan_section_title', 'option') 
                                    ?>
                                    <div class="description mb-5">
                                        <?php //echo get_field('pricing_plan_section_description', 'option') 
                                        ?>
                                    </div>
                                    <?php $pricing_plan_section_cta = get_field('pricing_plan_section_cta', 'option') ?>
                                    <a href="<?php echo esc_url($pricing_plan_section_cta); ?>" class="icon-btn d-none d-lg-inline-flex">Get Started</a>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="pricing-cards row gy-4">
                                    <?php
                                    /*$term_link = ''; // Initialize to empty string
                                    $terms = get_the_terms($service_post_object->ID, 'expertise');
                                    if ($terms && !is_wp_error($terms)) {
                                        foreach ($terms as $term) {
                                            $term_link = get_term_link($term);
                                            break;
                                        }
                                    }*/
                                    ?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single">
                                            <a href="<?php //echo $term_link; 
                                                        ?>">
                                                <h4><?php //echo $pricing_plan_title; 
                                                    ?></h4>
                                                <div class="description">
                                                    <?php //if (!empty(get_the_excerpt())) : 
                                                    ?>
                                                        <p><?php //echo get_the_excerpt(); 
                                                            ?></p>
                                                    <?php //else : 
                                                    ?>
                                                        <p><?php // echo wp_trim_words(get_the_content(), 20, '...');; 
                                                            ?></p>
                                                    <?php //endif 
                                                    ?>
                                                </div>
                                                <div class="single-footer">
                                                    <p>Price: <span class="fill-primary"><?php //echo $pricing_plan_price 
                                                                                            ?></span></p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <a href="<?php echo esc_url($pricing_plan_section_cta); ?>" class="icon-btn d-inline-flex d-lg-none mt-3 mx-2" style="width: fit-content;">Get Started</a>
                        </div>
                    </div>
                </section> -->
            <?php //endif 
            ?>
            <?php display_newsletter_banner(); ?>

            <footer class="entry-footer">
            </footer>

        </article>

<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>