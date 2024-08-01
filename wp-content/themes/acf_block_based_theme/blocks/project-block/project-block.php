<?php
$agrs = array(
    'posts_per_page'    => 4,
    'post_type'     => 'project',
    array(
        'taxonomy' => 'projects-category',
        'field'    => 'slug',
        'terms'    => 'feature',
    ),

    'orderby'        => 'modified',
    'order'          => 'DESC',

);
$project_posts = new WP_Query($agrs);
$project_section_title = get_field('project_section_title');

// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}
$project_section_CTA = get_field('project_section_cta');
if ($project_section_CTA) {
    $project_button_url = $project_section_CTA['url'];
    $project_button_title = $project_section_CTA['title'];
    $project_button_target = $project_section_CTA['target'] ?: '_self';
}

$project_post_objects = get_field('project_post_relation');

// Initialize variables




?>

<section class="projects <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $project_section_title ?>
            <div class="project-cards row gy-4">
                <?php if ($project_post_objects) : ?>
                    <?php foreach ($project_post_objects as $project_post_object) : ?>
                        <?php
                        if (is_int($project_post_object)) {
                            $project_post_object = get_post($project_post_object);
                        }
                        if ($project_post_object && is_object($project_post_object)) {
                            $project_post_link = get_permalink($project_post_object->ID);
                            $project_post_title = get_the_title($project_post_object->ID);
                            $project_post_thumbnail = get_field('project_thumbnail', $project_post_object->ID);
                            $project_post_excerpt = get_the_excerpt($project_post_object->ID);
                            $project_post_content = get_the_content($project_post_object->ID);
                        }
                        ?>
                        <div class="col-lg-6 single">
                            <a href="<?php echo $project_post_link; ?>">
                                <div class="card-content">
                                    <div class="card-thumbnail">
                                        <img src="<?php echo $project_post_thumbnail; ?>" />
                                    </div>
                                    <div class="card-overlay">
                                        <h3><?php echo $project_post_title; ?></h3>
                                        <?php if (!empty($project_post_excerpt)) : ?>
                                            <p><?php echo $project_post_excerpt; ?></p>
                                        <?php else : ?>
                                            <p><?php echo wp_trim_words($project_post_content, 20, '...'); ?></p>
                                        <?php endif ?>
                                        <span class="icon-btn d-xl-none">Preview</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php if ($project_section_CTA) : ?>
                <div class="cta-btn-wrapper mt-5 d-flex">
                    <a href="<?php echo $project_button_url ?>" class="icon-btn ms-auto"><?php echo $project_button_title ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>