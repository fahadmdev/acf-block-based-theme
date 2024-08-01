<?php
$staff_section_title = get_field('slider_section_title');
$staff_augmentation_slider = get_field('staff_agumentation_slider');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>

<section class="staff-augmentation padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $staff_section_title ?>
            <div class="swiper-pagination staff-augmentation-pagination"></div>
            <div class="slider-wrapper">
                <!-- <div class="swiper-button-prev staff-augmentation-nav"></div> -->
                <div class="swiper staff-augmentation-slider">
                    <?php if ($staff_augmentation_slider) : ?>
                        <div class="swiper-wrapper">
                            <?php foreach ($staff_augmentation_slider as $slide) : ?>
                                <div class="swiper-slide">
                                    <div class="slide">
                                        <h3><?php echo $slide['slide_title'] ?></h3>
                                        <p><?php echo $slide['slide_description'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                </div>
                <!-- <div class="swiper-button-next staff-augmentation-nav"></div> -->
            </div>
        </div>
    </div>
</section>