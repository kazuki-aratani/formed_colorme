<?php


?>
<div class="bl_mv">
  <div class="bl_mv_left"></div>
  <h1 class="bl_mv_heading js_hidden">
    <!-- <span class="bl_mv_heading_main hp_ff_Europa"><?= $args['mainTtl'] ?></span>
    <span class="bl_mv_heading_sub"><?= $args['subTtl'] ?></span> -->
    <!-- <img src="<?= my_img(); ?><?= $args['mv_ttl_img'] ?>" alt="" class="bl_mv_heading_img hp_sp_none">
    <img src="<?= my_img(); ?>sp_<?= $args['mv_ttl_img'] ?>" alt="" class="bl_mv_heading_img hp_pc_none"> -->
    <p class="bl_mv_heading_main hp_ff_Europa"><span class="hp_d_ib"><?= $args['mv_ttl_en'] ?></span><?php if (!empty($args['mv_ttl_en_2'])) : ?><span class="hp_d_ib"><?= $args['mv_ttl_en_2'] ?></span><?php endif; ?></p>
    <p class="bl_mv_heading_sub"><?= $args['mv_ttl_ja'] ?></p>
  </h1>
  <div class="bl_mv_img hp_sp_none">
    <img src="<?= $args['mv_bg_img'] ?>" alt="" class="zoom">
  </div>
  <div class="bl_mv_img hp_pc_none">
    <img src="<?= $args['sp_mv_bg_img'] ?>" alt="" class="zoom">
  </div>
</div>
<!-- /.bl_mv -->
<div class="bl_breadcrumbs">
	<div class="bl_breadcrumbs_cont">
		<a href="<?= home_url('/') ?>">トップ</a>
		<span>-</span>
		<?php if (is_home()) : ?>
		<a href="<?= home_url('blog/') ?>">ブログ</a>
		<?php elseif (is_category()) : ?>
		<span><?= get_category($cat)->name ?></span>
		<?php else : ?>
		<span><?php the_title(); ?></span>
		<?php endif; ?>
	</div>
</div>
<!-- /.bl_breadcrumbs -->