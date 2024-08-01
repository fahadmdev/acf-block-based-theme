<?php
$marquee_banner_title = get_field('banner_title');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>
<div class="marqee-banner text-center">
    <div class="container-fluid">
        <div class="inner">
            <p><?php echo $marquee_banner_title ?></p>
        </div>
    </div>
</div>