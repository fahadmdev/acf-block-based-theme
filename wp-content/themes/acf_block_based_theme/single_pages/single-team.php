<?php get_header(); ?>

<?php
if (have_posts()) :

    while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">

                <section class="profile-description-wrapper padding">
                    <div class="container">
                        <div class="inner row">
                            <div class="col-lg-4 text-center">
                                <div class="profile-image">
                                    <?php echo (get_the_post_thumbnail(get_the_ID())) ?>
                                </div>
                                <div>

                                </div>
                                <h3 class="mb-2"><?php the_title(); ?></h3>
                                <h5 class="fill-primary">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'designation');
                                    if ($terms && !is_wp_error($terms)) :
                                        $term_links = array();
                                        foreach ($terms as $term) {

                                            $term_links[] = $term->name;
                                        }
                                        echo implode(', ', $term_links);
                                    else :
                                        echo 'No categories assigned.';
                                    endif;
                                    ?>
                                </h5>
                                <?php if (have_rows('teams_social_icons_repeater')) : ?>
                                    <div class="social-icons">
                                        <?php while (have_rows('teams_social_icons_repeater')) : the_row();
                                            $icon = get_sub_field('team_social_icon');
                                            $link = get_sub_field('teams_social_link'); ?>
                                            <?php if ($icon && $link) : ?>
                                                <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
                                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="social-icon">
                                                </a>
                                            <?php endif; ?>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-8">
                                <div class="profile-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="expertise-list-wrapper padding">
                    <div class="container">
                        <div class="inner">
                            <h2>Area Of <br> <span class="fill-primary">Expertise</span></h2>
                            <div class="expertise-list row g-3">
                                <?php
                                $expertise_terms = get_the_terms(get_the_ID(), 'expertise');
                                if ($expertise_terms && !is_wp_error($expertise_terms)) :
                                    foreach ($expertise_terms as $expert) : ?>
                                        <div class="col-auto">
                                            <span class="experty"><?php echo $expert->name; ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="quotation-banner padding <?php echo $className ?>">
                    <div class="container">
                        <div class="inner">
                            <?php
                            $qoutation_banner_title = get_field('banner_title');
                            $qoutation_banner_image = get_field('banner_image');
                            ?>
                            <h2><?php echo $qoutation_banner_title ?></h2>
                            <img src="<?php echo $qoutation_banner_image ?>" />
                        </div>
                    </div>
                </section>
            </div>

        </article>

<?php endwhile;
else :
    echo '<p>No content found</p>';
endif;
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>