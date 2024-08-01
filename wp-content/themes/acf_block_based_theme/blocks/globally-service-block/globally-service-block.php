<?php
$globally_service_title = get_field('section_title');
$map_section_image = get_field('map_section_image');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>
<section class="global-delivery padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $globally_service_title ?>
            <img src="<?php echo $map_section_image ?>" />
        </div>
    </div>
</section>