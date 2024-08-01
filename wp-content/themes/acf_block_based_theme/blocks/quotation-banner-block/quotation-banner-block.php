<?php
$qoutation_banner_title = get_field('banner_title');
$qoutation_banner_image = get_field('banner_image');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>
<section class="quotation-banner padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <h2><?php echo $qoutation_banner_title ?></h2>
            <img src="<?php echo $qoutation_banner_image ?>" />
        </div>
    </div>
</section>