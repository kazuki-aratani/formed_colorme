<?php
$page_bottom_array = get_field('page_bottom', $args['page_id']);
$col_1 = $page_bottom_array['col1'][0];
$col_2 = $page_bottom_array['col2'];
$col2_1 = $col_2[0]['col2_item'];
$col2_2 = $col_2[1]['col2_item'];
?>

<?php if (!empty($col_1) || !empty($col2_1) || !empty($col2_2)) : ?>
  <div class="bl_pageBottomUnit">
    <?php if (!empty($col_1)) : ?>
      <section class="bl_defaultPage_businessLinkArea bl_companyLinksArea bl_companyLinksArea__col_1 bl_1140Inner bl_innerPad">
        <a href="<?= home_url($col_1['link']) ?>" class="hp_hoverScale_img_wrapper bl_companyLinksArea_item">
          <div class="bl_companyLinksArea_item_img bl_img_wrapper">
            <img src="<?= $col_1['img']; ?>" alt="" class="bl_img hp_hoverScale_img">
          </div>
          <div class="bl_companyLinksArea_item_cont hp_scrollUp">
            <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa"><?= $col_1['heading_en']; ?></p>
            <p class="bl_companyLinksArea_item_ttl"><?= $col_1['heading_ja']; ?></p>
          </div>
          <p class="bl_companyLinksArea_item_more">詳しくはこちら</p>
        </a>
      </section>
      <!-- /.bl_businessLinkArea -->
    <?php endif; ?>
    <?php if ((!empty($col2_1) || !empty($col2_2))) :
      $col2_modifier = '';
      if (empty($col2_1) || empty($col2_2)) {
        $col2_modifier = 'bl_companyLinksArea__col_1';
      }
    ?>
      <section class="bl_defaultPage_companyLinksArea bl_companyLinksArea bl_1140Inner bl_innerPad <?= $col2_modifier ?>">
        <a href="<?= home_url($col2_1['link']) ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
          <div class="bl_companyLinksArea_item_img bl_img_wrapper">
            <img src="<?= $col2_1['img']; ?>" alt="" class="bl_img hp_hoverScale_img">
          </div>
          <div class="bl_companyLinksArea_item_cont hp_scrollUp">
            <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa"><?= $col2_1['heading_en']; ?></p>
            <p class="bl_companyLinksArea_item_ttl"><?= $col2_1['heading_ja']; ?></p>
          </div>
          <p class="bl_companyLinksArea_item_more">詳しくはこちら</p>
        </a>
        <?php if (!empty($col2_1) && !empty($col2_2)) : ?>
          <a href="<?= home_url($col2_2['link']) ?>" class="bl_companyLinksArea_item hp_hoverScale_img_wrapper">
            <div class="bl_companyLinksArea_item_img bl_img_wrapper">
              <img src="<?= $col2_2['img']; ?>" alt="" class="bl_img hp_hoverScale_img">
            </div>
            <div class="bl_companyLinksArea_item_cont hp_scrollUp">
              <p class="bl_companyLinksArea_item_subTtl hp_ff_Europa"><?= $col2_2['heading_en']; ?></p>
              <p class="bl_companyLinksArea_item_ttl"><?= $col2_2['heading_ja']; ?></p>
            </div>
          </a>
        <?php endif; ?>
      </section>
      <!-- /.bl_defaultPage_companyLinksArea -->
    <?php endif; ?>
  </div>
<?php endif; ?>