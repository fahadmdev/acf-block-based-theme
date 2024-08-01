<?php

$primary_image = get_field('primary_image');
$secondary_image = get_field('secondary_image');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>
<section class="customized-images padding <?php echo $className ?>">
    <div class="container">
        <div class="inner row">
            <div class="col-lg-7">
                <div class="image-wrapper shapes">
                    <img src="<?php echo $primary_image ?>" />
                    
                </div>
            </div>
            <div class="col-lg-5">
                <div class="image-wrapper shapes2">
                    <img src="<?php echo $secondary_image ?>" />
                    
                </div>
            </div>
        </div>
    </div>
</section>