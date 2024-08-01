<?php
$contact_section_title = get_field('contact_section_title');
$contact_section_description = get_field('contact_section_description');
$conatct_form = get_field('contact_short_code');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
?>

<section class="contact-form-wrapper padding <?php echo $className ?>">
    <div class="container">
        <div class="animate-border">
            <div class="inner  p-3 p-sm-5">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="contact-header">
                            <?php echo $contact_section_title ?>
                            <div class="description">
                                <?php echo $contact_section_description ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <?php echo $conatct_form ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>