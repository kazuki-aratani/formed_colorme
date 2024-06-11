<?php
global $theme_clr_logo;  // 色付きの会社ロゴ
global $white_logo;  // 白色の会社ロゴ
global $header_menu;  // ヘッダーメニュー
global $footer_menu;  // フッターメニュー
global $twitter_account; // Twitterアカウント
global $instagram_account; // instagramアカウント
global $facebook_account; // facebookアカウント
global $line_account; // LINEアカウント
global $company_name; // 会社名


// ヘッダーメニューの合計文字数を数える
if (!empty($header_menu)) {
  $str = '';
  foreach ($header_menu as $value) {
    $str .= $value['item']['name'];
  }
  $sum = mb_strlen($sum_txt);
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    wp_title('|', true, 'right');
    bloginfo('name');
    ?>
  </title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php wp_head(); ?>
</head>
	
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P7CWRCJL62"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P7CWRCJL62');
</script>

<body class="js_overlay">
  <div class="bl_openAnime">
    <div class="bl_openAnime_loader">
    </div>
    <div class="bl_openAnime_logo_wrapper js_none">
      <img src="<?= $theme_clr_logo; ?>" alt="" class="bl_openAnime_logo">
    </div>
  </div>
  <!-- /.bl_openAnime -->
  <header class="ly_header">
    <div class="bl_header bl_header__navy">
      <div class="bl_header_left">
        <!-- サイトロゴ TOPと下層でタグを変える -->
        <?php if (is_front_page()) : ?>
          <h1 class="bl_header_logo">
            <a href="<?= home_url('/') ?>" class="hp_d_ib"><img src="<?= $white_logo; ?>" class="bl_header_logo_img bl_header_logo_img__white" alt="<?= $company_name ?>"></a>
            <a href="<?= home_url('/') ?>" class="hp_d_ib"><img src="<?= $theme_clr_logo; ?>" class="bl_header_logo_img bl_header_logo_img__navy none" alt="<?= $company_name ?>"></a>
          </h1>
        <?php else : ?>
          <div class="bl_header_logo">
            <a href="<?= home_url('/') ?>" class="hp_d_ib"><img src="<?= $white_logo; ?>" class="bl_header_logo_img bl_header_logo_img__white" alt="<?= $company_name ?>"></a>
            <a href="<?= home_url('/') ?>" class="hp_d_ib"><img src="<?= $theme_clr_logo; ?>" class="bl_header_logo_img bl_header_logo_img__navy none" alt="<?= $company_name ?>"></a>
          </div>
        <?php endif; ?>
        <!-- /サイトロゴ -->
      </div>
      <!-- /.bl_header_left -->
      <div class="bl_header_right">
        <?php if (!empty($header_menu)) : ?>
          <div class="bl_header_nav">
            <ul class="bl_header_nav_list <?php if ($sum > 36) {
                                            echo 'min';
                                          } ?>">
              <?php foreach ($header_menu as $index => $header_menu_item) :
                if (!empty($header_menu_item['item']['name'])) :
              ?>
                  <li><a href="<?= home_url($header_menu_item['item']['link']) ?>"><?= $header_menu_item['item']['name'] ?></a></li>
              <?php
                endif;

              endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </div>
      <!-- /.bl_header_right -->
      <div class="bl_header_hmbgBtn">
        <button class="bl_hmbgBtn" id="hmbgBtn">
          <span class="bl_hmbgBtn_line bl_hmbgBtn_line__top"></span>
          <span class="bl_hmbgBtn_line bl_hmbgBtn_line__middle"></span>
          <span class="bl_hmbgBtn_line bl_hmbgBtn_line__bottom"></span>
        </button>
      </div>
    </div>
    <div class="bl_hmbgMenu" id="hmbgMenu">
      <ul class="bl_hmbgMenu_list">
        <?php foreach ($header_menu as $index => $header_menu_item) :  ?>
          <li class="bl_hmbgMenu_item">
            <a href="<?= home_url($header_menu_item['item']['link']) ?>"><?= $header_menu_item['item']['name'] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
      <div class="bl_hmbgMenu_bottom">
        <div class="bl_hmbgMenu_bottom_inner">
          <div class="bl_hmbgMenu_btns">
            <a href="tel:" class="bl_hmbgMenu_telBtn">
              <span class="bl_hmbgMenu_telBtn_telNum">03-6453-2376</span>
              <span class="bl_hmbgMenu_telBtn_reception">受付時間9:00-17:30&emsp;土日祝休み</span>
            </a>
            <a href="<?= home_url('contact/') ?>" class="bl_hmbgMenu_contactBtn el_lineBtn el_lineBtn__white">
              <span>お問い合わせ</span>
            </a>
          </div>
          <!-- /.bl_hmbgMenu_btns -->
          <div class="bl_hmbgMenu_sns bl_sns_unit">
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
      </div>
      <!-- <img src="<?= my_img(); ?>sp_hmbgmenu_right_txt.svg" alt="" class="bl_hmbgMenu_right_txt_img"> -->
    </div>
    <!-- .bl_hmbgMenu_ -->
  </header>