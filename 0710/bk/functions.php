<?php
/*
 * CSS・JS読み込み定義
 */
// CSS登録
add_action('wp_enqueue_scripts', 'my_styles');
function my_styles()
{
  $today = date("Ymd");
  wp_enqueue_style('reset', get_template_directory_uri() . '/assets/css/reset.css');
  wp_enqueue_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600&display=swap');
  wp_enqueue_style('google-fonts-2', 'https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap');
  wp_enqueue_style('main', get_template_directory_uri() . "/assets/css/style.css", false, $today);
}
// Js登録
add_action('wp_enqueue_scripts', 'my_scripts');
function my_scripts()
{
  wp_enqueue_script('jquery-3.6.0', 'https://code.jquery.com/jquery-3.6.0.min.js', false, '1.0', false);
  wp_enqueue_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', false, '1.0', false);
  wp_enqueue_script('script-name', get_template_directory_uri() . '/assets/js/main.js', false, '1.0', true);
  wp_enqueue_script('yubinbango', 'https://yubinbango.github.io/yubinbango/yubinbango.js', array(), false, true);
}


/*
 * ショートコード
 */
// 画像ディレクトリのパスを返すショートタグ
add_action('img', 'my_img');
function my_img()
{
  return get_template_directory_uri() . '/assets/images/';
}

// サイトのパスを返すショートタグ
add_shortcode('my_site', 'my_site');
function my_site()
{
  return home_url('/');
}


// アイキャッチ有効化
add_theme_support('post-thumbnails');
// メニューバー有効化
add_theme_support('menus');


// ペジネーション
function pagination($pages = '', $range = 2)
{
  $showitems = ($range * 1) + 1;
  global $paged;
  if (empty($paged))
    $paged = 1;
  if ($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if (!$pages) {
      $pages = 1;
    }
  }
  if (1 != $pages) {
    // 画像を使う時用に、テーマのパスを取得
    $img_pass = get_template_directory_uri();
    echo "<div class=\"m-pagenation\">";
    // 「1/2」表示 現在のページ数 / 総ページ数
    // echo "<div class=\"m-pagenation__result\">". $paged."/". $pages."</div>";
    // 「前へ」を表示
    if ($paged > 1)
      echo "<div class=\"m-pagenation__prev\"><a href='" . get_pagenum_link($paged - 1) . "'>前へ</a></div>";
    // ページ番号を出力
    echo "<ol class=\"m-pagenation__body\">\n";
    for ($i = 1; $i <= $pages; $i++) {
      if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
        echo ($paged == $i) ? "<li class=\"-current\">" . $i . "</li>" : // 現在のページの数字はリンク無し
          "<li><a href='" . get_pagenum_link($i) . "'>" . $i . "</a></li>";
      }
    }
    // [...] 表示
    // if(($paged + 4 ) < $pages){
    //     echo "<li class=\"notNumbering\">...</li>";
    //     echo "<li><a href='".get_pagenum_link($pages)."'>".$pages."</a></li>";
    // }
    echo "</ol>\n";
    // 「次へ」を表示
    if ($paged < $pages)
      echo "<div class=\"m-pagenation__next\"><a href='" . get_pagenum_link($paged + 1) . "'>次へ</a></div>";
    echo "</div>\n";
  }
}

// アーカイブの余計なタイトルを削除
add_filter('get_the_archive_title', function ($title) {
  if (is_category()) {
    $title = single_cat_title('', false);
  } elseif (is_tag()) {
    $title = single_tag_title('', false);
  } elseif (is_month()) {
    $title = single_month_title('', false);
  }
  return $title;
});

/*
 * 固定ページ【設定専用】Settingからカスタムフィールド取得
 */
const SETTING_PAGEID = 7;
function globalVal_setup($page_id)
{
  global $theme_clr_logo;  // 色付きの会社ロゴ
  global $white_logo;  // 白色の会社ロゴ
  global $header_menu;  // ヘッダーメニュー
  global $footer_menu;  // フッターメニュー
  global $footer_menu_1;  // フッターメニュー
  global $footer_menu_2;  // フッターメニュー
  global $footer_menu_3;  // フッターメニュー
  global $footer_contact_msg;  // フッター お問い合わせメッセージ
  global $company_name; // 会社名
  global $business_hours_array; // 営業時間
  global $business_hours_open; // 営業開始時間
  global $business_hours_close; // 営業終了時間
  global $closing_day; //定休日
  global $company_tel; // 会社電話番号
  global $company_post; // 会社住所（郵便番号）
  global $company_address; // 会社住所（番地）
  global $company_building; // 会社住所（建物名）
  global $company_access; // 会社住所（アクセス）
  global $googleMap; // googleMap iframe
  global $googleMap_link; // googleMap リンクURL
  global $twitter_account; // Twitterアカウント
  global $instagram_account; // instagramアカウント
  global $facebook_account; // facebookアカウント
  global $line_account; // LINEアカウント


  //  会社ロゴ
  $logo =  get_field('logo', $page_id);
  // 色付き
  $theme_clr_logo = $logo['themeclr'];
  // 白色
  $white_logo = $logo['white'];
  // ヘッダーメニュー
  $header_menu = get_field('header_menu', $page_id);
  // フッターメニュー
  $footer_menu = get_field('footer_menu', $page_id);
  // フッターメニュー1
  $footer_menu_1 = $footer_menu['footer_menu_list_1'];
  // フッターメニュー2
  $footer_menu_2 = $footer_menu['footer_menu_list_2'];
  // フッターメニュー3
  $footer_menu_3 = $footer_menu['footer_menu_list_3'];
  // 
  $footer_contact_msg = get_field('footer_contact_msg', $page_id);
  // 会社名
  $company_name = get_field('company_name', $page_id);
  // 会社電話番号
  $company_tel = get_field('company_tel', $page_id);
  // 営業時間
  $business_hours_array = get_field('business_hours', $page_id);
  // 営業時間 開始
  $business_hours_open = $business_hours_array['open'];
  // 営業時間 終了
  $business_hours_close = $business_hours_array['close'];
  // 定休日
  $closing_day = get_field('closing_day', $page_id);
  // 会社住所
  $company_address_array = get_field('company_address', $page_id);
  // 会社住所（郵便番号）
  $company_post = $company_address_array['post'];
  // 会社住所（番地）
  $company_address = $company_address_array['address'];
  // 会社住所（建物名）
  $company_building = $company_address_array['building'];
  // 会社住所（アクセス）
  $company_access = $company_address_array['access'];
  // googleMap iframe
  $googleMap = $company_address_array['googlemap_iframe'];
  // googleMap リンクURL
  $googleMap_link = $company_address_array['googlemap_url'];
  // SNS
  $sns = get_field('sns', $page_id);
  if (!empty($sns)) {
    // SNS Twitterアカウント
    $twitter_account = $sns['twitter'];
    // SNS instagramアカウント
    $instagram_account = $sns['instagram'];
    // SNS facebookアカウント
    $facebook_account = $sns['facebook'];
    // SNS LINEアカウント
    $line_account = $sns['line'];
  }
}
globalVal_setup(SETTING_PAGEID);



/*
* 投稿・固定ページエディタの不要なものを消す
*/
function remove_postedit_support()
{
  unregister_taxonomy_for_object_type('post_tag', 'post'); // タグ
  remove_post_type_support('post', 'comments'); // コメント
  remove_post_type_support('page', 'comments'); // コメント
  global $typenow;
  $post_id = $_GET['post'];

  // ページIDが59または1017でない場合にエディタを削除
  if($post_id != 59 && $post_id != 1017){
    remove_post_type_support('page', 'editor'); // 本文削除
  }

  remove_post_type_support('page', 'thumbnail'); // アイキャッチ
}
add_action('init', 'remove_postedit_support');



// 郵便番号 自動入力
function add_yubinbango_class()
{
  echo <<<EOC
<script>
  jQuery('.mw_wp_form form').addClass('h-adr');
</script>
EOC;
}
add_action('wp_print_footer_scripts', 'add_yubinbango_class');


// 半角と全角スペースを削除して小文字化する関数
function trim_and_strtolower($txt)
{
  $txt = str_replace(" ", "", $txt);
  $txt = strtolower($txt);
  return $txt;
}


// PC専用改行タグ置換
function gen_pc_wrap($str)
{
  $str = str_replace("[pcbr]", "<br class='hp_sp_none'>", $str);
  return $str;
}
