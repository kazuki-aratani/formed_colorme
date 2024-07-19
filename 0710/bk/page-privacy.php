<?php
/*
Template Name: 個人情報保護方針
*/
get_header();

$mv = get_field('page_mv');
$args = [
  'mv_bg_img' => $mv['img'],
  'sp_mv_bg_img' => $mv['sp_img'],
  'mv_ttl_en' => $mv['heading_en'],
  'mv_ttl_en_2' => $mv['heading_en_2'],
  'mv_ttl_ja' => $mv['heading_ja']
]

?>
<?php get_template_part('templates/page_mv', null, $args); ?>
<main class="ly_main bl_privacyPage">
  <div class="bl_privacyPage_cont bl_1140Inner bl_innerPad">
    <?php the_content(); ?>
  </div>
  <?php
  $page_id = get_the_ID();
  $page_bottom_arg = ['page_id' => $page_id];
  get_template_part('templates/page_bottom', null, $page_bottom_arg); ?>
</main>
<?php get_footer(); ?>