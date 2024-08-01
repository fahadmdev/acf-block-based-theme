<?php

$Career_Form_Section_title = get_field('section_title');
$form_short_code = get_field('form_short_code');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>

<section class="employment-form-wrapper padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $Career_Form_Section_title ?>
            <div class="animate-border">
                <div class="employment-form">
                    <?php echo $form_short_code ?>
                </div>
            </div>
        </div>
    </div>
</section>