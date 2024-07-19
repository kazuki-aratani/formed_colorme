<?php
global $white_logo;  // 白色の会社ロゴ
global $footer_menu_1;  // フッターメニュー
global $footer_menu_2;  // フッターメニュー
global $footer_menu_3;  // フッターメニュー
global $footer_contact_msg;  // フッターお問い合わせメッセージ
global $company_tel; // 会社電話番号
global $business_hours_open; // 営業開始時間
global $business_hours_close; // 営業終了時間
global $closing_day; //定休日
global $company_post; // 会社住所（郵便番号）
global $company_address; // 会社住所（番地）
global $company_building; // 会社住所（建物名）
global $twitter_account; // Twitterアカウント
global $instagram_account; // instagramアカウント
global $facebook_account; // facebookアカウント
global $line_account; // LINEアカウント
?>
<section class="bl_footContactSec bl_bg_lightThemeClr">
  <h2 class="bl_secTtl bl_1140Inner bl_innerPad hp_scrollUp">
    <span class="bl_secTtl_en hp_clr_theme hp_ff_Europa">CONTACT</span>
    <span class="bl_secTtl_ja">お問い合わせ</span>
  </h2>
  <!-- /.bl_secTtl -->
  <div class="bl_footContactSec_body bl_1140Inner bl_innerPad">
    <p class="bl_footContactSec_desc hp_scrollUp"><?= $footer_contact_msg ?></p>
    <div class="bl_footContactSec_btn_unit">
      <a href="tel:" class="bl_footContactSec_btn bl_footContactSec_telBtn hp_flex_c hp_scrollUp">
        <div class="bl_footContactSec_telBtn_heading hp_flex_c">
          <p class=""><?= $company_tel; ?></p>
        </div>
        <p class="bl_footContactSec_telBtn_small">受付時間<?= $business_hours_open ?>-<?= $business_hours_close ?>&emsp;<?php if (!empty($closing_day)) {
                                                                                                                      echo '&emsp;' . $closing_day . '休み';
                                                                                                                    } ?></p>
      </a>
      <a href="<?= home_url('contact/') ?>" class="bl_footContactSec_btn bl_footContactSec_contactBtn hp_flex_c hp_scrollUp">
        <div class="bl_footContactSec_contactBtn_heading hp_flex_c">
          <p>お問い合わせフォーム</p>
        </div>
      </a>
    </div>
  </div>
</section>
<!-- /.bl_footContactSec -->
<footer class="ly_footer">
  <div class="bl_footer">
    <div class="bl_footer_inner">
      <div class="bl_footer_left">
        <div class="bl_footer_logo">
          <img src="<?= my_img(); ?>logo-white.png" class="bl_footer_logo_img">
        </div>
        <div class="bl_footer_access">
          <?php if ($company_post) : ?>
            <p>〒<?= $company_post ?></p>
          <?php endif; ?>
          <p>
            <span class="hp_d_ib"><?= $company_address ?></span>
            <span class="hp_d_ib"><?= $company_building ?></span>
          </p>
          <?php if (!empty($company_tel)) : ?>
            <p>TEL：<?= $company_tel ?></p>
          <?php endif; ?>
        </div>
        <div class="bl_footer_sns bl_sns_unit">
          <?php if ($instagram_account) : ?>
            <a href="<?= $instagram_account ?>" target="blank" class="bl_sns bl_sns__instagram"></a>
          <?php endif; ?>
          <?php if ($twitter_account) : ?>
            <a href="<?= $twitter_account ?>" target="blank" class="bl_sns bl_sns__twitter"></a>
          <?php endif; ?>
          <?php if ($facebook_account) : ?>
            <a href="<?= $facebook_account ?>" target="blank" class="bl_sns bl_sns__facebook"></a>
          <?php endif; ?>
          <?php if ($line_account) : ?>
            <a href="<?= $line_account ?>" target="blank" class="bl_sns bl_sns__line"></a>
          <?php endif; ?>
        </div>
      </div>
      <!-- /.bl_footer_left -->
      <div class="bl_footer_right">
        <div class="bl_footer_nav">
          <div class="bl_footer_nav_list_unit">
            <?php if (!empty($footer_menu_1)) :
            ?>
              <div class="bl_footer_nav_list bl_footer_nav_list__noNest">
                <div class="bl_footer_nav_list_body">
                  <?php foreach ($footer_menu_1 as $footer_item) :
                    if (!empty($footer_item['item']['name'])) :
                  ?>
                      <a href="<?= home_url($footer_item['item']['link']) ?>" class="bl_footer_nav_list_item"><?= $footer_item['item']['name'] ?></a>
                  <?php
                    endif;
                  endforeach; ?>
                </div>
              </div>
              <!-- /.bl_footer_nav_list -->
            <?php endif; ?>
            <?php if (!empty($footer_menu_2)) :
            ?>
              <div class="bl_footer_nav_list bl_footer_nav_list__noNest">
                <div class="bl_footer_nav_list_body">
                  <?php foreach ($footer_menu_2 as $footer_item) :
                    if (!empty($footer_item['item']['name'])) :
                  ?>
                      <a href="<?= home_url($footer_item['item']['link']) ?>" class="bl_footer_nav_list_item"><?= $footer_item['item']['name'] ?></a>
                  <?php
                    endif;
                  endforeach; ?>
                </div>
              </div>
              <!-- /.bl_footer_nav_list -->
            <?php endif; ?>
            <?php if (!empty($footer_menu_3)) :
            ?>
              <div class="bl_footer_nav_list bl_footer_nav_list__noNest">
                <!-- <div class="bl_footer_nav_list_head">採用情報</div> -->
                <div class="bl_footer_nav_list_body">
                  <?php foreach ($footer_menu_3 as $footer_item) :
                    if (!empty($footer_item['item']['name'])) :
                  ?>
                      <a href="<?= home_url($footer_item['item']['link']) ?>" class="bl_footer_nav_list_item"><?= $footer_item['item']['name'] ?></a>
                  <?php
                    endif;
                  endforeach; ?>
                </div>
              </div>
              <!-- /.bl_footer_nav_list -->
            <?php endif; ?>
          </div>
          <!-- /.bl_footer_nav_list_unit -->
        </div>
        <!-- /.bl_footer_nav -->
      </div>
      <!-- /.bl_footer_right -->
      <a href="" class="bl_footer_pageTop">PAGE TOP</a>
    </div>
    <!-- /.bl_footer_inner -->
    <div class="bl_footer_copyright">
      @ 2023 ForMED
   </div>
    <!-- /.bl_footer_copyright -->
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>