<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 16,
    'post_type'      => 'team',
    'paged' => $paged
);

$team_query = new WP_Query($args);
$section_title = get_field('team_section_title');



// want to get class name from block use this variable
$className = '';



if (!empty($block['className'])) {
    $className = $block['className'];
}

?>
<section class="team padding <?php echo $className ?>">
    <div class="container">
        <div class="inner">
            <?php echo $section_title; ?>
            <div class="team-listing row gy-4">
                <?php if ($team_query->have_posts()) : ?>
                    <?php while ($team_query->have_posts()) : $team_query->the_post(); ?>

                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <a class="single" href="<?php echo get_permalink(); ?>">
                                <div class="card-thumbnail">
                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                </div>
                                <h5><?php echo get_the_title(); ?></h5>
                                <p>
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'designation');
                                    if ($terms && !is_wp_error($terms)) {
                                        $term_names = array();
                                        foreach ($terms as $term) {
                                            $term_names[] = $term->name;
                                        }
                                        echo implode(', ', $term_names);
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </p>
                            </a>
                        </div>

                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="cta-btn-wrapper mt-5 text-end">
                    <nav class="pagination">
                        <?php
                        echo paginate_links(array(
                            'total' => $team_query->max_num_pages,
                            'prev_text' => __('« Prev'),
                            'next_text' => __('Next »'),
                        ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>