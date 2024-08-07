<?php get_header();
$term = get_queried_object();

$term_id = $term->term_id;
$taxonomy = $term->taxonomy;
$project_overview = get_field('profession_overview', $taxonomy . '_' . $term_id);
$child_terms = get_terms(array(
    'taxonomy' => $taxonomy,
    'parent' => $term_id,
    'hide_empty' => false,
));
$args = array(
    'post_type' => 'pricing-plan',
    'tax_query' => array(
        array(
            'taxonomy' => 'pricing-plan-category',
            'field' => 'slug',
            'terms' => $term->slug,
        ),
    ),
    'posts_per_page' => -1, // Number of posts to display, -1 for all
);

$query = new WP_Query($args);
var_dump($query->have_posts());


?>

<div class="container">
    <section class="inner-page-hero ">
    <div id="particles-js"></div>
        <div class="container">
            <svg class="bg-image" width="642" height="591" viewBox="0 0 642 591" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.1">
                    <path d="M477.384 581.95C643.163 623.049 660.037 470.807 609.98 360.938C584.237 296.835 664.297 254.737 632.346 175.325C600.395 95.9144 499.749 191.112 448.095 69.6032C396.44 -51.9059 165.328 7.41367 162.665 113.615C160.003 219.815 121.129 190.634 32.1986 296.835C-56.7318 403.035 66.8125 581.95 197.279 537.461C327.746 492.972 297.925 537.461 477.384 581.95Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M348.366 353.381C364.156 358.124 389.629 335.913 378.758 318.053C368.803 301.699 375.517 285.045 371.079 274.042C359.396 245.076 353.211 255.731 339.335 242.782C322.45 227.025 278.235 219.506 278.235 255.731C278.235 285.523 262.128 276.609 254.99 298.918C247.853 321.227 260.002 346.527 291.987 346.527C303.998 346.527 322.069 345.483 348.366 353.381Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M466.46 561.174C618.604 598.967 636.26 458.546 589.765 357.042C565.457 297.28 638.85 257.495 609.4 184.303C579.291 109.478 487.233 196.989 439.013 85.3497C390.519 -26.5455 176.397 26.6979 173.977 126.537C171.556 225.792 134.752 198.453 53.2577 297.027C-28.2371 395.601 85.1807 560.551 206.694 520.106C326.392 479.661 300.925 520.012 466.46 561.174Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M455.536 540.398C594.045 574.886 612.482 446.286 569.55 353.146C546.677 297.725 613.402 260.253 586.453 193.28C558.188 123.04 474.717 202.867 429.931 101.096C384.598 -1.18542 187.467 45.9818 185.289 139.459C183.11 231.768 148.376 206.272 74.3172 297.22C0.257985 388.167 103.549 539.152 216.109 502.751C325.038 466.351 303.925 502.562 455.536 540.398Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M444.611 519.622C569.485 550.804 588.704 434.026 549.334 349.25C527.897 298.17 587.953 263.011 563.506 202.257C537.082 136.603 462.199 208.744 420.848 116.842C378.676 24.1747 198.535 65.2659 196.599 152.382C194.663 237.744 161.998 214.091 95.3747 297.412C28.7518 380.733 121.915 517.753 225.523 485.397C323.684 453.041 306.924 485.112 444.611 519.622Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M433.686 498.846C544.924 526.723 564.925 421.765 529.117 345.355C509.115 298.615 562.504 265.769 540.558 211.234C515.977 150.166 449.68 214.62 411.764 132.588C372.753 49.5345 209.604 84.5492 207.909 165.304C206.214 243.72 175.619 221.909 116.432 297.603C57.2445 373.298 140.281 496.353 234.936 468.041C322.329 439.729 309.923 467.662 433.686 498.846Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M422.208 478.068C519.81 502.641 540.592 409.504 508.348 341.458C489.781 299.059 536.502 268.527 517.056 220.21C494.318 163.728 436.609 220.498 402.127 148.334C366.277 74.8942 220.118 103.833 218.665 178.226C217.213 249.696 188.687 229.727 136.936 297.795C85.1846 365.863 158.094 474.953 243.796 450.686C320.42 426.419 312.368 450.212 422.208 478.068Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M410.074 457.291C494.041 478.559 515.605 397.243 486.922 337.561C469.791 299.503 509.844 271.283 492.9 229.186C472.004 177.29 422.883 226.373 391.835 164.08C359.146 100.254 229.977 123.116 228.767 191.147C227.557 255.671 201.101 237.545 156.785 297.986C112.469 358.428 175.252 453.553 252.002 433.33C317.856 413.108 314.158 432.761 410.074 457.291Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M397.904 436.514C468.235 454.476 490.581 384.981 465.461 333.664C449.765 299.946 483.15 274.04 468.707 238.161C449.654 190.852 409.119 232.249 381.506 179.824C351.977 125.612 239.8 142.399 238.832 204.069C237.863 261.646 213.477 245.362 176.598 298.177C139.717 350.992 192.373 432.152 260.169 415.974C315.256 399.796 315.911 415.31 397.904 436.514Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M385.682 415.736C442.378 430.393 465.505 372.719 443.947 329.766C429.686 300.389 456.404 276.796 444.463 247.137C427.252 204.412 395.304 238.124 371.126 195.569C344.758 150.97 249.571 161.68 248.845 216.989C248.119 267.62 225.802 253.178 196.358 298.367C166.913 343.555 209.443 410.75 268.286 398.617C312.603 386.483 317.613 397.858 385.682 415.736Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M373.382 394.956C416.442 406.308 440.351 360.455 422.356 325.866C409.53 300.83 429.58 279.551 420.14 256.11C404.772 217.972 381.412 243.998 360.668 211.311C337.46 176.327 259.264 180.96 258.78 229.908C258.296 273.593 238.049 260.993 216.041 298.555C194.032 336.117 226.434 389.347 276.325 381.258C309.873 373.17 319.237 380.405 373.382 394.956Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                    <path d="M360.965 374.172C390.39 382.219 415.081 348.188 400.648 321.964C389.258 301.268 402.639 282.302 395.7 265.08C382.175 231.528 367.403 249.868 350.092 227.051C330.046 201.68 268.841 200.238 268.599 242.823C268.357 279.562 250.179 268.805 235.606 298.741C221.034 328.676 243.309 367.941 284.247 363.897C307.027 359.852 320.743 362.948 360.965 374.172Z" stroke="#FBFF29" stroke-opacity="0.39" stroke-width="3" />
                </g>
            </svg>
            <div class="inner text-center taxnomy-heading">


                <h1><?php echo $term->name ?></h1>
                <div class="description">

                </div>
            </div>
        </div>
    </section>

    <div>
        <h1> </h1>
        <h2>Profession <br> <span class="fill-primary">Overview</span></h2>
        <?php echo wp_kses_post($project_overview); ?>
    </div>
    <div class="expertise-section">
        <h2>Area <br> of <span class="fill-primary">Expertise</span> </h2>
        <ul>
            <?php foreach ($child_terms as $child_term) : ?>
                <li class="animate-border"><?php echo esc_html($child_term->name); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="pricing-section">
        <h2>Pricing <br><span class="fill-primary"> Plan </span> </h2>
        <?php if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (have_rows('pricing_plan_bullets_repeater', $taxonomy . '_' . $term_id)) : ?>
                    <div class="pricing-card">

                        <div class="row">
                            <div class="col-md-9">
                                <ul>
                                    <?php while (have_rows('pricing_plan_bullets_repeater', $taxonomy . '_' . $term_id)) : the_row(); ?>
                                        <li><?php the_sub_field('pricing_plan_bullet', $taxonomy . '_' . $term_id); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="pricing-hire">
                                    <p><span class="fill-primary"><?php echo get_field('plan_card_price', get_the_ID())  ?>/</span><?php echo get_field('plan_card_estimate_time', get_the_ID()) ?></p>
                                    <a class="icon-btn" href="#"> Hire Us Now</a>
                                </div>

                            </div>
                        </div>



                    </div>
                <?php endif; ?>
                <h3></h3>
                <h3></h3>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No related posts found.</p>
        <?php endif; ?>
    </div>
    <div>
        <?php if (have_rows('faq_section', $taxonomy . '_' . $term_id)) :  ?>
            <section class="faqs padding">
                <div class="container">
                    <div class="inner">
                        <h2>FAQs</h2>
                        <div class="accordion" id="faqAccordion">
                            <?php
                            $counter = 0;
                            while (have_rows('faq_section', $taxonomy . '_' . $term_id)) : the_row();
                                $counter++;
                                $collapse_id = 'faqAccordionCollapse' . $counter;
                                $header_id = 'faq' . $counter;
                            ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?php echo $header_id; ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_id; ?>">
                                            <span class="pe-3"><?php echo get_sub_field('faqs_title', get_the_ID()) ?></span>
                                            <i class="fa-solid fa-arrow-right ms-auto"></i>
                                        </button>
                                    </h2>
                                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $header_id; ?>" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            <?php echo get_sub_field('faqs_description', get_the_ID()) ?>
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

</div>

</div>
<?php get_footer(); ?>