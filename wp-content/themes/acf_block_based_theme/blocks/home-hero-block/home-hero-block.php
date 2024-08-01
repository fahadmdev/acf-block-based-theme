<?php

$hero_title = get_field('home_hero_title');
$hero_description = get_field('home_hero_description');
$primary_link_title = "";
$primary_link_target = "";
$primary_link_url = "";
$primary_CTA = get_field('primary_cta_button');
if ($primary_CTA) {
    $primary_link_url = $primary_CTA['url'];
    $primary_link_title = $primary_CTA['title'];
    $primary_link_target = $primary_CTA['target'] ? $link['target'] : '_self';
}

$secondary_button_target = "";
$secondary_button_title = "";
$secondary_button_url = "";
$Secondary_CTA = get_field('secondary_cta_button');
if ($Secondary_CTA) {
    $secondary_button_url = $Secondary_CTA['url'];
    $secondary_button_title = $Secondary_CTA['title'];
    $secondary_button_target = $Secondary_CTA['target'] ?: '_self';
}


$form_short_code = get_field('home_contact_form_short_code');

$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}

?>

<!-- Hero Section start here-->
<section class="home-hero">
    <div id="particles-js"></div>
    <div class="container">
        <div class="inner d-flex">
            <div class="row my-auto align-items-center">
                <div class="col-lg-7">
                    <div class="hero-text">
                        <?php echo $hero_title ?>
                        <div class="hero-description">
                            <p><?php echo $hero_description ?></p>
                        </div>
                        <div class="hero-cta-btns d-flex mb-4 mb-lg-0 ">
                            <a class="cta-btn me-4" href="<?php echo esc_url($primary_link_url); ?>" target="<?php echo esc_attr($primary_link_target); ?>"><?php echo esc_html($primary_link_title); ?></a>
                            <a class="icon-btn" href="<?php echo esc_url($secondary_button_url); ?>" target="<?php echo esc_attr($secondary_button_target); ?>"><?php echo esc_html($secondary_button_title); ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="animate-border">
                        <div class="hero-form">
                            <?php echo $form_short_code ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section end here-->