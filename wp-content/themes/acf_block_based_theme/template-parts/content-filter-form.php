<!-- Serach Side Filters  -->
<div class="col-md-3">
    <form id="filter-form" class="animate-border">
        <input type="hidden" name="s" value="<?php echo get_search_query(); ?>">
        <?php
        $post_types = array('service', 'post', 'project', 'team');

        echo '<h6>Apply Search <span class="fill-primary">Filters </span></h6>';

        foreach ($post_types as $post_type) {

            $taxonomies = get_object_taxonomies($post_type, 'objects');
            foreach ($taxonomies as $taxonomy) {
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy->name,
                    'hide_empty' => false,
                ));
                if (!empty($terms)) {
                    echo "<h4>" . $taxonomy->labels->name . "</h4>";
                    echo '<div class="taxonomy-container" data-post-type="' . $post_type . '">';
                    echo '<ul class="taxonomy-terms">';
                    foreach ($terms as $term) {
                        echo '<li class="gchoice"><label class="input-label"><input type="checkbox" class="term-checkbox" name="' . $taxonomy->name . '[]" value="' . $term->slug . '"> ' . $term->name . '</label></li>';
                    }
                    echo '</ul>';
                    echo '<div class="show-all-container"><a type="button" class="show-all">Show All</a></div>';
                    echo '</div>';
                }
            }
        }
        ?>
    </form>
</div>

<!-- Ensure this is present for displaying results -->