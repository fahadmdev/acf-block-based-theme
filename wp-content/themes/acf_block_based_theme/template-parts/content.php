<!-- Search Page Content -->
<div class="search-box">
    <article class="animate-border" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        ?>
        <div class="entry-content">
            <?php
            if (is_singular()) :
                the_title('<h2 class="entry-title">', '</h2>');
            else :
                echo '<h6 class="entry-title">' . get_the_title() . '</h6>';
            endif;
            ?>
            <?php
            the_content(sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'qca_schools'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'qca_schools'),
                'after'  => '</div>',
            ));
            ?>
            <?php
            if (is_singular()) :
                the_title('<h1 class="entry-title">', '</h1>');
            else :

                echo '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">Read More</a>';
            endif;

            ?>
        </div>

    </article>

</div>



<?php get_sidebar(); ?>