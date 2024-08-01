<?php
get_header();
?>

<main id="primary" class="site-main search-result2">

	<section class="inner-page-hero ">
	<div id="particles-js"></div>
		<div class="container">
			<?php echo get_field('search_svg_icon', 'option') ?>
			<div class="inner text-center search-page">
				<h1 class="page-title">
					<?php printf(esc_html__('Search Results for: %s', 'acf_based_custom_theme'), '<span class="fill-primary">' . get_search_query() . '</span>'); ?>
				</h1>
			</div>
		</div>
	</section>

	<div class="container ">
		<div class="row ">
			<?php get_template_part('template-parts/content', 'filter-form'); ?>
			<div class="col-md-9">
				<div class="search-results filtered-data my-5 my-lg-0">
					<?php
					$args = array(
						'post_type' => 'any',
						's' => get_search_query(),
					);

					// Check for taxonomy filters
					foreach ($_GET as $key => $values) {
						if (taxonomy_exists($key) && !empty($values)) {
							$args['tax_query'][] = array(
								'taxonomy' => $key,
								'field' => 'slug',
								'terms' => $values,
							);
						}
					}

					$query = new WP_Query($args);

					if ($query->have_posts()) :
						while ($query->have_posts()) :
							$query->the_post();
							get_template_part('template-parts/content', 'search');
						endwhile;
					else :
						get_template_part('template-parts/content', 'none');
					endif;

					wp_reset_postdata();
					?>
					<div class="pagination">
						<?php
						echo paginate_links(array(
							'total' => $query->max_num_pages,
						));
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php
get_sidebar();
get_footer();
?>