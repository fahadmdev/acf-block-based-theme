<?php
$hero_section_title = get_field('hero_title');
$hero_section_description = get_field('hero_description');

$className = '';



if (!empty($block['className'])) {
  $className = $block['className'];
}
?>


<style>

</style>
<section class="inner-page-hero">
  <div id="particles-js"></div>

  <div class="container" style="z-index:-1 ">
    <?php echo get_field('hero_section_svg') ?>

    <div class="inner text-center">
      <?php echo $hero_section_title ?>
      <div class="description">
        <p><?php echo $hero_section_description ?></p>
      </div>
    </div>
  </div>
</section>