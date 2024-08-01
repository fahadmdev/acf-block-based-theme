<?php
$newsletter_banner_title = get_field('newsletter_banner_title');
$newsletter_banner_description = get_field('newsletter_banner_description');


$newsletter_button_title = "";
$newsletter_button_url = "";
$newsletter_button_target = "";
$newsletter_CTA = get_field('newsletter_banner_cta');
if ($newsletter_CTA) {
    $newsletter_button_url = $newsletter_CTA['url'];
    $newsletter_button_title = $newsletter_CTA['title'];
    $newsletter_button_target = $newsletter_CTA['target'] ?: '_self';
}


// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>

<div class="newsletter-banner padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <div class="banner-text">
                <?php echo $newsletter_banner_title ?>
                <div class="description">
                    <?php echo $newsletter_banner_description ?>
                </div>
            </div>
            <div class="banner-cta">
                <a class="icon-btn" href="<?php echo esc_url($newsletter_button_url); ?>" target="<?php echo esc_attr($newsletter_button_target); ?>"><?php echo esc_html($newsletter_button_title); ?></a>
            </div>
        </div>
    </div>
</div>